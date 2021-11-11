<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="content dcf-bleed dcf-d-grid unl-grid-cols dcf-pt-8 dcf-pb-8 dcf-ai-center"<?php print $content_attributes; ?>>
    <div class="dcf-2nd dcf-pt-6 dcf-pl-7 dcf-pb-6 dcf-pr-7 dcf-z-1 dev-bg-scarlet-gradient-transparent dev-section-featured-region-2">
        <h3 class="dcf-txt-h4 unl-cream"><?php print render($content['p_n_secfeat_title']); ?></h3>
        <p class="unl-cream"><?php print render($content['p_n_secfeat_copy']); ?></p>
        <?php print render($content['p_n_secfeat_link']); ?>
    </div>
    <div class="dcf-1st dcf-relative dev-section-featured-region-1">
        <div class="dcf-ratio dcf-ratio-16x9 tl-bg-block mobile-img-width">
            <?php print render($content['p_n_secfeat_image']); ?>
        </div>
        <div class="dcf-absolute dcf-pin-top dcf-pin-left dcf-ratio dcf-ratio-16x9 asem-ms-z-neg1 asem-ms-bg-block asem-ms-bg-block-lt mobile-screen">
            <div class="dcf-ratio-child unl-bg-dots-gray"></div>
        </div>
    </div>
  </div>
</div>

