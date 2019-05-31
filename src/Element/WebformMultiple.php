<?php

namespace Drupal\unl_five\Element;

use Drupal\webform\Element\WebformMultiple as WebformMultipleContrib;
use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Utility\WebformElementHelper;

/**
 * Provides a webform element to assist in creation of multiple elements.
 *
 * @FormElement("webform_multiple")
 */
class WebformMultiple extends WebformMultipleContrib {

  /**
   * Process items and build multiple elements widget.
   */
  public static function processWebformMultiple(&$element, FormStateInterface $form_state, &$complete_form) {
    $element = parent::processWebformMultiple($element, $form_state, $complete_form);

    // Get unique key used to store the current number of items.
    $number_of_items_storage_key = static::getStorageKey($element, 'number_of_items');
    $number_of_items = $form_state->get($number_of_items_storage_key);

    // Build add more actions.
    if ($element['#add_more'] && (empty($element['#cardinality']) || ($number_of_items < $element['#cardinality']))) {
      $element['add']['submit']['#attributes']['class'][] = 'dcf-btn';
      $element['add']['submit']['#attributes']['class'][] = 'dcf-btn-secondary';
    }

    return $element;
  }

}
