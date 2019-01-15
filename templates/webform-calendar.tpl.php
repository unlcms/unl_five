<?php
/**
 * role="presentation" causes the HTML validator to throw the false-positive error:
 * Attribute “src” not allowed on element “input” at this point.
 * This file removes role="presentation" from the default Webform implementation.
 */

?>
<input type="image" aria-hidden="true" src="<?php print base_path() . drupal_get_path('module', 'webform') . '/images/calendar.png'; ?>" class="<?php print implode(' ', $calendar_classes); ?>" alt="<?php print t('Open popup calendar'); ?>" title="<?php print t('Open popup calendar'); ?>" />
