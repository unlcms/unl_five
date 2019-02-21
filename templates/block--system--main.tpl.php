<?php

$wrapper_id = 'id="' . $block_html_id . '"';

if ($format == 'partial') {
  //don't give an id to the wrapper for partial requests.  This can result in duplicate ID errors.
  $wrapper_id = '';
}
?>
<div<?php print $wrapper_id; ?> class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
    <h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>
</div>
