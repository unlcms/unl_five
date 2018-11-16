<?php

/**
 * Implements hook_form_system_theme_settings_alter().
 * Done as THEMENAME_form_system_theme_settings_alter(), reference http://drupal.org/node/177868
 */
function unl_five_form_system_theme_settings_alter(&$form, &$form_state) {
  global $user;

  // Add checkboxes to the Toggle Display form to hide UNL template items on an affiliate site
  $form['theme_settings'] += array(
    'toggle_unl_banner' => array(
      '#type' => 'checkbox',
      '#title' => t('UNL affiliate banner'),
      '#default_value' => theme_get_setting('toggle_unl_banner'),
      '#access' => theme_get_setting('unl_affiliate'),
    ),
    'toggle_unl_branding' => array(
      '#type' => 'checkbox',
      '#title' => t('UNL branding elements'),
      '#default_value' => theme_get_setting('toggle_unl_branding'),
      '#access' => theme_get_setting('unl_affiliate'),
    ),
    'toggle_unl_breadcrumb' => array(
      '#type' => 'checkbox',
      '#title' => t('UNL breadcrumb'),
      '#default_value' => theme_get_setting('toggle_unl_breadcrumb'),
      '#access' => theme_get_setting('unl_affiliate'),
    ),
    'toggle_unl_search' => array(
      '#type' => 'checkbox',
      '#title' => t('UNL search box'),
      '#default_value' => theme_get_setting('toggle_unl_search'),
      '#access' => theme_get_setting('unl_affiliate'),
    ),
    'toggle_unl_tools' => array(
      '#type' => 'checkbox',
      '#title' => t('UNL tools'),
      '#default_value' => theme_get_setting('toggle_unl_tools'),
      '#access' => theme_get_setting('unl_affiliate'),
    ),
  );

  $form['intermediate_breadcrumbs'] = array(
    '#type' => 'fieldset',
    '#title' => t('Intermediate breadcrumbs'),
    '#description' => t('Breadcrumbs that are displayed between the UNL breadcrumb and this site\'s breadcrumb'),
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
    'unl_affiliate' => array(
      '#type' => 'checkbox',
      '#title' => t('Affiliate site'),
      '#default_value' => theme_get_setting('unl_affiliate'),
      '#description' => t('Grants access to the Color scheme picker, Logo image settings, Shortcut icon settings on this page for customizing the UNL template.'),
      '#access' => !!count(array_intersect(array('administrator'), array_values($GLOBALS['user']->roles))),
    ),
    'unl_rso' => array(
      '#type' => 'checkbox',
      '#title' => t('RSO site'),
      '#default_value' => theme_get_setting('unl_rso'),
      '#description' => t('Adds text to the header and footer that designates the site as belonging to a Registered Student Organization.'),
      '#access' => !!count(array_intersect(array('administrator'), array_values($GLOBALS['user']->roles))),
    ),
    'unl_speedy' => array(
      '#type' => 'checkbox',
      '#title' => t('Speedy template'),
      '#default_value' => theme_get_setting('unl_speedy'),
      '#description' => t('Use the Speedy version of the Fixed template.'),
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
