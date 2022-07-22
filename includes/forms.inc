<?php

/**
 * Implements hook_form_alter().
 */
function unl_five_form_alter(&$form, &$form_state, $form_id) {
  $form['#attributes']['class'][] = 'dcf-form';

  if (isset($form['actions']['submit'])) {
    $form['actions']['submit']['#attributes']['class'][] = 'dcf-btn';
    $form['actions']['submit']['#attributes']['class'][] = 'dcf-btn-primary';
    $form['actions']['submit']['#attributes']['class'][] = 'dcf-mt-4';
  }
  if (isset($form['submit'])) {
    $form['submit']['#attributes']['class'][] = 'dcf-btn';
    $form['submit']['#attributes']['class'][] = 'dcf-btn-secondary';
    $form['submit']['#attributes']['class'][] = 'dcf-mt-2';
  }
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
        $attributes['class'] = 'element-invisible';
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

    if ($element['#type'] == 'checkbox') {
      $attributes['class'][] = 'dcf-input-checkbox';
    }
    if ($element['#type'] == 'radio') {
      $attributes['class'][] = 'dcf-input-radio';
    }
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
        $attributes['class'] = 'element-invisible';
      }
      $title = '<legend' . drupal_attributes($attributes) . '>' . $element['#title'];
      if (!empty($element['#required'])) {
        $title .= theme('form_required_marker', array('element' => $element));
      }
      $title .= '</legend>';
    }
    else if (isset($element['#type']) && $element['#type'] == 'date_popup') {
      $attributes['class'] = 'dcf-txt-sm';
      $title = '<h4' . drupal_attributes($attributes) . '>' . $element['#title'] . '</h4>';
      if (!empty($element['#required'])) {
        $title .= theme('form_required_marker', array('element' => $element));
      }
    }
    else {
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
 * Adds labels so that it passes WCAG2.0.
 */
function unl_five_webform_time($variables) {
  $element = $variables['element'];

  $element['hour']['#attributes']['class'] = array('hour');
  $element['minute']['#attributes']['class'] = array('minute');

  // Add error classes to all items within the element.
  if (form_get_error($element)) {
    $element['hour']['#attributes']['class'][] = array('error');
    $element['minute']['#attributes']['class'][] = array('error');
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
 * Theme function to render a grid component.
 *
 * Used here to show the <label> and hide the text with .dcf-sr-only so that the faux-radio button displays.
 */
function unl_five_webform_grid($variables) {
  $element = $variables['element'];
  $right_titles = _webform_grid_right_titles($element);

  $rows = array();

  // Set the header for the table.
  $header = _webform_grid_header($element, $right_titles);

  foreach (element_children($element) as $key) {
    $question_element = $element[$key];
    $title_element =& $question_element;
    if ($question_element['#type'] == 'select_or_other') {
      $title_element =& $question_element['select'];
    }
    $question_titles = explode('|', $title_element['#title'], 2);

    // Create a row with the question title.
    $required = !empty($question_element['#required']) ? theme('form_required_marker', array('element' => $question_element)) : '';
    $row = array(array('data' => t('!title !required', array('!title' => webform_filter_xss($question_titles[0]), '!required' => $required)), 'class' => array('webform-grid-question')));

    // Render each radio button in the row.
    if ($question_element['#type'] == 'radios' || $question_element['#type'] == 'checkboxes') {
      $radios = form_process_radios($question_element);
      foreach (element_children($radios) as $key) {
        $radio_title = $radios[$key]['#title'];
        if (!strlen($radio_title)) {
          $row[] = '&nbsp;';
        }
        else {
          $radios[$key]['#title'] = '<span class="dcf-sr-only">' . $question_element['#title'] . ' - ' . $radio_title . '</span>';
          //$radios[$key]['#title_display'] = 'invisible';
          $row[] = array('data' => drupal_render($radios[$key]), 'class' => array('checkbox', 'webform-grid-option'), 'data-label' => array($radio_title));
        }
      }
    }
    else {
      $title_element['#title_display'] = 'none';
      $row[] = array(
        'data' => drupal_render($question_element),
        'colspan' => count($element['#grid_options']),
      );
    }
    if ($right_titles) {
      $row[] = array('data' => isset($question_titles[1]) ? webform_filter_xss($question_titles[1]) : '', 'class' => array('webform-grid-question'));
    }

    // Convert the parents array into a string, excluding the "submitted" wrapper.
    $nested_level = $question_element['#parents'][0] == 'submitted' ? 1 : 0;
    $parents = str_replace('_', '-', implode('--', array_slice($question_element['#parents'], $nested_level)));

    $rows[] = array(
      'data' => $row,
      'class' => empty($question_element['#grid_question'])
        ? array(
          'webform-component',
          'webform-component-' . str_replace('_', '-', $question_element['#type']),
          'webform-component--' . $parents,
        )
        : array(),
    );
  }

  $option_count = count($header) - 1;
  return theme('table', array(
    'header' => $header,
    'rows' => $rows,
    'sticky' => $element['#sticky'],
    'attributes' => array(
      'class' => array(
        'webform-grid',
        'webform-grid-' . $option_count,
      ),
    ),
  ));
}

/**
 * Returns HTML for a marker for required form elements. Implements theme_form_required_marker().
 *
 * @param $variables
 *   An associative array containing:
 *   - element: An associative array containing the properties of the element.
 *
 * @ingroup themeable
 */
function unl_five_form_required_marker($variables) {
  $attributes = array(
    'class' => 'dcf-required',
  );
  return '<small' . drupal_attributes($attributes) . '>Required</small>';
}
