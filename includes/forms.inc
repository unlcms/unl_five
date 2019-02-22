<?php

/**
 * Implements hook_form_alter().
 */
function unl_five_form_alter(&$form, &$form_state, $form_id) {
  // Add DCF classes directly to form elements.
  if (isset($form['submitted'])) {
    foreach ($form['submitted'] as &$element) {
      if (isset($element['#type'])) {
        $class = _unl_five_form_element_class($element);
        $element['#attributes']['class'][] = $class;
      }
    }
  }
}

/**
 * Helper recursive function for unl_five_form_alter() to get to elements in a fieldset.
 */
function _unl_five_form_element_class(&$element) {
  $class = '';
  switch ($element['#type']) {
    case 'textfield':
    case 'textarea':
    case 'webform_number':
    case 'webform_email':
      $class = 'dcf-input-text';
      break;
    case 'select':
    case 'date':
      $class = 'dcf-input-select';
      break;
    case 'radios':
    case 'checkboxes':
      $class = 'dcf-input-control';
      break;
    case 'fieldset':
      foreach ($element as &$nested_element) {
        if (isset($nested_element['#type'])) {
          $class = _unl_five_form_element_class($nested_element);
          $nested_element['#attributes']['class'][] = $class;
        }
      }
  }
  return $class;
}

/**
 * Replacement for theme_webform_element().
 * 
 * Converts composite element labels into fieldsets, the label becomes a legend.
 * see https://drupal.org/node/1195418
 */
function unl_five_webform_element($variables) {
  $element = $variables['element'];

  $element['#wrapper_attributes']['class'][] = 'dcf-form-group';

  $output = '<div ' . drupal_attributes($element['#wrapper_attributes']) . '>' . "\n";

  // Composite elements consist of more than one HTML form control. These must be grouped by a fieldset.
  // Developers can mark any fieldtype as composite with #composite.
  // radios, checkboxes, and date are marked as composite. In D8, they are so marked in their respective form_process_*().
  if (isset($element['#type']) && in_array($element['#type'], array('radios', 'checkboxes', 'date', 'webform_grid', 'webform_time', 'managed_file'), TRUE)) {
    $element['#composite'] = TRUE;
  }
  $composite = FALSE;
  if (isset($element['#composite']) && $element['#composite'] === TRUE) {
    $composite = TRUE;
  }

  if ($composite) {
    $output .= '<fieldset' . drupal_attributes(array('class' => 'fieldset-invisible')) . '>';
  }

  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . webform_filter_xss($element['#field_prefix']) . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . webform_filter_xss($element['#field_suffix']) . '</span>' : '';

  // Generate description for above or below the field.
  $above = !empty($element['#webform_component']['extra']['description_above']);
  $description = array(
    FALSE => '',
    TRUE => !empty($element['#description']) ? ' <div class="dcf-form-help">' . $element['#description'] . "</div>\n" : '',
  );

  // Generate the title, either a legend or a label, only if the title will be used
  if (!in_array($element['#title_display'], array('none', 'attribute'))) {
    if ($composite) {
      $attributes = array();
      if ($element['#title_display'] == 'invisible') {
        $attributes['class'] = 'dcf-legend element-invisible';
      }
      else {
        $attributes['class'] = 'dcf-legend';
      }
      $title = '<legend' . drupal_attributes($attributes) . '>' . $element['#title'];
      if (!empty($element['#required'])) {
        $title .= ' ' . theme('form_required_marker', array('element' => $element));
      }
      $title .= '</legend>';
    } else {
      $title = ' ' . theme('form_element_label', $variables);
    }
  }

  switch ($element['#title_display']) {
    case 'inline':
      $output .= $description[$above];
      $description[$above] = '';
    // FALL THRU.
    case 'before':
    case 'invisible':
      $output .= $title . ' ' . $prefix . $description[$above] . $element['#children'] . $suffix . "\n";
      break;

    case 'after':
      $output .= ' ' . $prefix . $description[$above] . $element['#children'] . $suffix . $title . "\n";
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= ' ' . $prefix . $description[$above] . $element['#children'] . $suffix . "\n";
      break;
  }

  $output .= $description[!$above];

  if ($composite) {
    $output .= '</fieldset>';
  }

  $output .= "</div>\n";

  return $output;
}

/**
 * Replacement for theme_form_element().
 * 
 * Moves invisible checkboxes and radio buttons to the right of the form control to pass WCAG2.0
 */
function unl_five_form_element($variables) {
  $element = & $variables['element'];
  // This is also used in the installer, pre-database setup.
  $t = get_t();

  // This function is invoked as theme wrapper, but the rendered form element
  // may not necessarily have been processed by form_builder().
  $element += array(
    '#title_display' => 'before',
  );

  // Add element #id for #type 'item'.
  if (isset($element['#markup']) && !empty($element['#id'])) {
    $attributes['id'] = $element['#id'];
  }
  // Add element's #type and #name as class to aid with JS/CSS selectors.
  $attributes['class'] = array('form-item');
  if (!empty($element['#type'])) {
    $attributes['class'][] = 'form-type-' . strtr($element['#type'], '_', '-');
  }
  if (!empty($element['#name'])) {
    $attributes['class'][] = 'form-item-' . strtr($element['#name'], array(' ' => '-', '_' => '-', '[' => '-', ']' => ''));
  }
  // Add a class for disabled elements to facilitate cross-browser styling.
  if (!empty($element['#attributes']['disabled'])) {
    $attributes['class'][] = 'form-disabled';
  }
  $output = '<div' . drupal_attributes($attributes) . '>' . "\n";

  // Composite elements consist of more than one HTML form control. These must be grouped by a fieldset.
  // Developers can mark any fieldtype as composite with #composite.
  // radios, checkboxes, and date are marked as composite. In D8, they are so marked in their respective form_process_*().
  if (isset($element['#type']) && in_array($element['#type'], array('radios', 'checkboxes', 'date'), true)) {
    $element['#composite'] = true;
  }
  $composite = false;
  if (isset($element['#composite']) && $element['#composite'] === true) {
    $composite = true;
  }

  if ($composite) {
    $output .= '<fieldset' . drupal_attributes(array('class' => 'fieldset-invisible')) . '>';
  }

  // If #title is not set, we don't display any label or required marker.
  if (!isset($element['#title'])) {
    $element['#title_display'] = 'none';
  }
  if (!isset($element['#children'])) {
    $element['#children'] = '';
  }
  $prefix   = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
  $suffix   = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';
  $children = ' ' . $prefix . $element['#children'] . $suffix;

  // Generate the title, either a legend or a label, only if the title will be used
  if (!in_array($element['#title_display'], array('none', 'attribute'))) {
    if ($composite) {
      $attributes = array();
      if ($element['#title_display'] == 'invisible') {
        $attributes['class'] = 'dcf-legend element-invisible';
      }
      else {
        $attributes['class'] = 'dcf-legend';
      }
      $title = '<legend' . drupal_attributes($attributes) . '>' . $element['#title'];
      if (!empty($element['#required'])) {
        $title .= theme('form_required_marker', array('element' => $element));
      }
      $title .= '</legend>';
    } else {
      $title = ' ' . theme('form_element_label', $variables);
    }
  }

  switch ($element['#title_display']) {
    case 'before':
    case 'invisible':
      $output .= $title . $children;
      break;

    case 'after':
      $output .= $children . $title;
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= $children;
      break;
  }
  $output .= "\n";

  if (!empty($element['#description'])) {
    $output .= '<div class="dcf-form-help">' . $element['#description'] . "</div>\n";
  }

  if ($composite) {
    $output .= '</fieldset>';
  }

  $output .= "</div>\n";

  return $output;
}

/**
 * Theme a webform time element.
 * 
 * Adds labels so that it passes WCAG2.0 and adds .dcf-input-select class.
 */
function unl_five_webform_time($variables) {
  $element = $variables['element'];

  $element['hour']['#attributes']['class'] = array('dcf-input-select', 'hour');
  $element['minute']['#attributes']['class'] = array('dcf-input-select', 'minute');

  // Add error classes to all items within the element.
  if (form_get_error($element)) {
    $element['hour']['#attributes']['class'][] = array('dcf-input-select', 'error');
    $element['minute']['#attributes']['class'][] = array('dcf-input-select', 'error');
  }

  $element['hour']['#title']           = 'New Hour';
  $element['hour']['#title_display']   = 'invisible';
  $element['minute']['#title']         = 'New Minute';
  $element['minute']['#title_display'] = 'invisible';

  $output = '<div class="webform-container-inline">' . drupal_render($element['hour']) . drupal_render($element['minute']) . drupal_render($element['ampm']) . '</div>';

  return $output;
}

/**
 * Implements theme_file().
 * 
 * Renders the file element via core, then passes it to the theme wrapper, which adds labels.
 * 
 * @param $vars
 *
 * @return string
 */
function unl_five_file($vars) {
  //Use the default theme_file
  $vars['element']['#children'] = theme_file($vars);
  //theme it to add labels
  return theme('form_element', $vars);
}

/**
 * Returns HTML for a managed file element.
 *
 * @param $variables
 *   An associative array containing:
 *   - element: A render element representing the file.
 *
 * @ingroup themeable
 */
function unl_five_file_managed_file($variables) {
  /*
   * Remove the duplicate ID from the wrapper DIV
   * The same ID that was on the <input> was being applied
   * to the wrapper .form-managed-file div, which was
   * throwing errors.
   */
  if (isset($variables['element']['#id'])) {
    unset($variables['element']['#id']);
  }

  return theme_file_managed_file($variables);
}

/**
 * Implements theme_fieldset() to add .dcf-legend class.
 */
function unl_five_fieldset($variables) {
  $element = $variables['element'];
  element_set_attributes($element, array('id'));
  _form_set_class($element, array('form-wrapper'));

  $output = '<fieldset' . drupal_attributes($element['#attributes']) . '>';
  if (!empty($element['#title'])) {
    // Always wrap fieldset legends in a SPAN for CSS positioning.
    $output .= '<legend class="dcf-legend"><span class="fieldset-legend">' . $element['#title'] . '</span></legend>';
  }
  $output .= '<div class="fieldset-wrapper">';
  if (!empty($element['#description'])) {
    $output .= '<div class="fieldset-description">' . $element['#description'] . '</div>';
  }
  $output .= $element['#children'];
  if (isset($element['#value'])) {
    $output .= $element['#value'];
  }
  $output .= '</div>';
  $output .= "</fieldset>\n";
  return $output;
}

/**
 * Implements theme_form_element_label() to add .dcf-label class.
 */
function unl_five_form_element_label($variables) {
  $element = $variables['element'];
  // This is also used in the installer, pre-database setup.
  $t = get_t();

  // If title and required marker are both empty, output no label.
  if ((!isset($element['#title']) || $element['#title'] === '') && empty($element['#required'])) {
    return '';
  }

  // If the element is required, a required marker is appended to the label.
  $required = !empty($element['#required']) ? theme('form_required_marker', array('element' => $element)) : '';

  $title = filter_xss_admin($element['#title']);

  $attributes = array();
  // Style the label as class option to display inline with the element.
  if ($element['#title_display'] == 'after') {
    $attributes['class'] = 'dcf-label option';
  }
  // Show label only to screen readers to avoid disruption in visual flows.
  elseif ($element['#title_display'] == 'invisible') {
    $attributes['class'] = 'dcf-label element-invisible';
  }
  else {
    $attributes['class'] = 'dcf-label';
  }

  if (!empty($element['#id'])) {
    $attributes['for'] = $element['#id'];
  }

  // The leading whitespace helps visually separate fields from inline labels.
  return ' <label' . drupal_attributes($attributes) . '>' . $t('!title !required', array('!title' => $title, '!required' => $required)) . "</label>\n";
}
