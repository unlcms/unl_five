<?php

$wrapper_id = 'id="' . $region_name . '"';
$format = filter_input(INPUT_GET, 'format', FILTER_SANITIZE_STRING);

if ($format == 'partial') {
  //don't give an id to the wrapper for partial requests.  This can result in duplicate ID errors.
  $wrapper_id = '';
}
?>
<div <?php print $wrapper_id; ?> class="<?php print $classes; ?>">
  <?php print $content; ?>
</div>
