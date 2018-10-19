<?php

$wrapper_id = 'id="' . $region_name . '"';
  
if ($format == 'partial') {
  //don't give an id to the wrapper for partial requests.  This can result in duplicate ID errors.
  $wrapper_id = '';
}
?>

<?php if ($region != 'navlinks' && $region != 'content'): ?>
<div <?php print $wrapper_id; ?> class="<?php print $classes; ?>">
<?php endif;?>
  <?php print $content; ?>
<?php if ($region != 'navlinks' && $region != 'content'): ?>
</div>
<?php endif;?>
