<div class="<?php print $classes; ?> dcf-d-flex dcf-flex-col dcf-flex-nowrap dcf-w-max-md dcf-bg-white dcf-rounded unl-box-shadow dcf-card-as-link"<?php print $attributes; ?> style="cursor: pointer;">
  <div class="content"<?php print $content_attributes; ?>>
    <div class="dcf-1st dcf-d-flex dcf-flex-col dcf-pl-5 dcf-pt-3 dcf-pb-3">
      <p class="dcf-lh-3 unl-darkest-gray dcf-bold dcf-mb-0"><?php print render($content['p_p_secsecondary_title']); ?></p>
    </div>
    <div class="dcf-2nd dcf-ratio dcf-ratio-4x3">
      <?php print render($content['p_p_secsecondary_image']); ?>
    </div>
    <div class="dcf-3rd dcf-grow-1">
      <p class="dcf-txt-xs dcf-p-5 dcf-mb-0"><?php print render($content['p_p_secsecondary_link']); ?></p>
    </div>
  </div>
</div>

