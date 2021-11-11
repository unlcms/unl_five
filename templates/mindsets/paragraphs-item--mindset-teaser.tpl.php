<div class="dcf-d-flex dcf-jc-center <?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="content dcf-d-flex dcf-flex-col dcf-flex-nowrap dcf-w-max-md dcf-bg-white dcf-rounded unl-box-shadow dcf-card-as-link"<?php print $content_attributes; ?> style="cursor: pointer;">
    <div class="dcf-2nd dcf-d-flex dcf-flex-col dcf-flex-grow-1 dcf-pt-5 dcf-pr-6 dcf-pb-6 dcf-pl-6 dcf-txt-center">
      <h3 class="dcf-txt-h5 dcf-lh-3"><?php print render($content['p_n_msteaser_title']); ?></h3>
      <div class="dcf-flex-grow-1">
        <p class="dcf-txt-sm"><?php print render($content['p_n_msteaser_text']); ?></p>
      </div>
      <div class="">
        <?php print render($content['p_n_msteaser_link']); ?>
      </div>
    </div>
    <div class="dcf-1st dcf-ratio dcf-ratio-4x3">
      <?php print render($content['p_n_msteaser_image']); ?>
    </div>
  </div>
</div>

