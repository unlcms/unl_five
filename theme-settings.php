<?php

use Drupal\Core\Form\FormStateInterface;

function unl_five_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  $moduleHandler = \Drupal::service('module_handler');
  if ($moduleHandler->moduleExists('group')) {
    $form['group'] = [
      '#type' => 'details',
      '#title' => t('Group support'),
      '#open' => TRUE,
    ];
    $form['group']['adjust'] = [
      '#type' => 'checkbox',
      '#title' => t('Modify theme to make Groups into "subsites"'),
      '#default_value' => theme_get_setting('group.adjust'),
      '#tree' => FALSE,
    ];
  }
}
