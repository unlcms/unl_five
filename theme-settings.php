<?php

/**
 * Implements hook_form_system_theme_settings_alter().
 * Done as THEMENAME_form_system_theme_settings_alter(), reference http://drupal.org/node/177868
 */
function unl_five_form_system_theme_settings_alter(&$form, &$form_state) {
  global $user;

  $form['intermediate_breadcrumbs'] = array(
    '#type' => 'fieldset',
    '#title' => t('Intermediate breadcrumbs'),
    '#description' => t('Breadcrumbs that are displayed between the UNL breadcrumb and this site\'s breadcrumb'),
    '#weight' => -35,
    'site_name_abbreviation' => array(
      '#type' => 'textfield',
      '#title' => t('Site name abbreviation'),
      '#default_value' => theme_get_setting('site_name_abbreviation'),
      '#description' => t('An abbreviated version of your site\'s name to use in breadcrumbs.'),
      '#weight' => 10,
    ),
  );
  $intermediate_breadcrumbs = theme_get_setting('intermediate_breadcrumbs');
  for ($i = 0; $i < 5; $i++) {
    $form['intermediate_breadcrumbs'][] = array(
      'text' => array(
        '#type' => 'textfield',
        '#field_prefix' => t('Text ' . ($i + 1)),
        '#default_value' => isset($intermediate_breadcrumbs[$i]) ? $intermediate_breadcrumbs[$i]['text'] : '',
        '#parents' => array('intermediate_breadcrumbs' , $i, 'text'),
      ),
      'href' => array(
        '#type' => 'textfield',
        '#field_prefix' => t('&nbsp;URL ' . ($i + 1)),
        '#default_value' => isset($intermediate_breadcrumbs[$i]) ? $intermediate_breadcrumbs[$i]['href'] : '',
        '#parents' => array('intermediate_breadcrumbs' , $i, 'href'),
      ),
    );
  }

  $form['call_to_action'] = array(
    '#type' => 'fieldset',
    '#title' => t('Call-to-action links'),
    '#description' => t('Leaving a URL empty will result in only the main university link being shown for that item.'),
    '#weight' => -40,
    'cta_visit_text' => array(
      '#type' => 'textfield',
      '#field_prefix' => t('Visit text&nbsp;&nbsp;'),
      '#default_value' => null !== theme_get_setting('cta_visit_text') ? theme_get_setting('cta_visit_text') : 'Visit the ' . variable_get('site_name'),
    ),
    'cta_visit_url' => array(
      '#type' => 'textfield',
      '#field_prefix' => t('Visit URL&nbsp;&nbsp;'),
      '#default_value' => theme_get_setting('cta_visit_url'),
    ),
    'cta_apply_text' => array(
      '#type' => 'textfield',
      '#field_prefix' => t('Apply text'),
      '#default_value' => null !== theme_get_setting('cta_apply_text') ? theme_get_setting('cta_apply_text') : 'Apply to the ' . variable_get('site_name'),
    ),
    'cta_apply_url' => array(
      '#type' => 'textfield',
      '#field_prefix' => t('Apply URL'),
      '#default_value' => theme_get_setting('cta_apply_url'),
    ),
    'cta_give_text' => array(
      '#type' => 'textfield',
      '#field_prefix' => t('Give text&nbsp;&nbsp;'),
      '#default_value' => null !== theme_get_setting('cta_give_text') ? theme_get_setting('cta_give_text') : 'Give to the ' . variable_get('site_name'),
    ),
    'cta_give_url' => array(
      '#type' => 'textfield',
      '#field_prefix' => t('Give URL&nbsp;&nbsp;'),
      '#default_value' => theme_get_setting('cta_give_url'),
    ),
  );

  $form['unl_head'] = array(
    '#type' => 'fieldset',
    '#title' => t('Site specific CSS and JavaScript'),
    '#weight' => -45,
    'unl_css' => array(
      '#title' => t('CSS'),
      '#description' => t('Custom CSS rules for this site. Do not include @style tags.', array('@style' => '<style>')),
      '#type' => 'textarea',
      '#rows' => 16,
      '#default_value' => theme_get_setting('unl_css'),
    ),
    'unl_js' => array(
      '#title' => t('JavaScript'),
      '#description' => t('Custom Javascript for this site. Do not include @script tags.', array('@script' => '<script>')),
      '#type' => 'textarea',
      '#rows' => 16,
      '#default_value' => theme_get_setting('unl_js'),
    ),
    'head_html' => array(
      '#title' => t('Head HTML'),
      '#description' => t('HTML to be added inside the @head tags.', array('@head' => '<head>')),
      '#type' => 'textarea',
      '#rows' => 3,
      '#default_value' => theme_get_setting('head_html'),
    ),
  );

  $form['advanced_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Advanced settings'),
    '#weight' => 40,
    'enable_drill_down' => array(
      '#type' => 'checkbox',
      '#title' => t('Enable drill-down main menu'),
      '#default_value' => theme_get_setting('enable_drill_down'),
      '#description' => t('Changes the navigation (and site title) if you are 2+ levels deep with even deeper enabled menu links.'),
    ),
    'unl_rso' => array(
      '#type' => 'checkbox',
      '#title' => t('RSO site'),
      '#default_value' => theme_get_setting('unl_rso'),
      '#description' => t('Adds text to the header and footer that designates the site as belonging to a Registered Student Organization.'),
      '#access' => !!count(array_intersect(array('administrator'), array_values($GLOBALS['user']->roles))),
    ),
  );
  $form['#submit'][] = 'unl_five_form_system_theme_settings_submit';
  _unl_five_attach_syntax_highlighting($form['unl_head']);
}

/**
 * Form submit callback.
 */
function unl_five_form_system_theme_settings_submit($form, &$form_state) {
  // Delete existing files, then save them.
  foreach (array('css', 'js') as $type) {
    _unl_five_delete_file('custom_unl_five.' . $type);
    if (drupal_strlen(trim($form_state['values']['unl_' . $type])) !== 0) {
      _unl_five_save_file($form_state['values']['unl_' . $type], 'custom_unl_five.' . $type);
      drupal_set_message('File saved to custom/custom_unl_five.' . $type . ' and will be automatically included on all pages.');
    }
  }
  drupal_flush_all_caches();
}

/**
 * Saves CSS & Javascript in the file system (but only if not empty).
 */
function _unl_five_save_file($data, $filename) {
  $path = variable_get('unl_custom_code_path', 'public://custom');
  file_prepare_directory($path, FILE_CREATE_DIRECTORY);
  return file_unmanaged_save_data($data, $path . '/' . $filename, FILE_EXISTS_REPLACE);
}

/**
 * Deletes CSS & Javascript from the file system (but only if it exists).
 */
function _unl_five_delete_file($filename) {
  $path = variable_get('unl_custom_code_path', 'public://custom') . '/' . $filename;
  if (file_exists($path)) {
    return file_unmanaged_delete($path);
  }
  return FALSE;
}

/**
 * Attaches syntax highlighting to a form element.
 */
function _unl_five_attach_syntax_highlighting(&$form, $css = TRUE, $js = TRUE) {
  $form['#attached']['js'][] = 'sites/all/libraries/codemirror/lib/codemirror.js';
  $form['#attached']['css'][] = 'sites/all/libraries/codemirror/lib/codemirror.css';
  if ($css) {
    $form['#attached']['js'][] = 'sites/all/libraries/codemirror/mode/css/css.js';
  }
  if ($js) {
    $form['#attached']['js'][] = 'sites/all/libraries/codemirror/mode/javascript/javascript.js';
  }
  $form['#attached']['css'][] = 'sites/all/libraries/codemirror/theme/default.css';
  $form['#attached']['js'][] = drupal_get_path('theme', 'unl_five') . '/codemirror/unl.js';
  $form['#attached']['css'][] = drupal_get_path('theme', 'unl_five') . '/codemirror/unl.css';
}
