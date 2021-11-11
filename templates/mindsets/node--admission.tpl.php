<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

<div class="dcf-hero">
  <div class="dcf-hero-group-2 dcf-bleed asem-ms-hero-group-2 dcf-d-grid unl-grid dcf-row-gap-4">
    <header class="asem-ms-hero-heading dcf-z-1 asem-ms-hero-heading-l">
      <h2 class="dcf-d-inline dcf-txt-2xl unl-font-display unl-cream unl-bg-darkest-gray dev-hed"><?php print render($content['n_admission_hero_title']); ?></h2>
  		<p class="dcf-mt-3 dcf-mb-0 dcf-lh-1"><span class="dcf-subhead unl-cream unl-bg-darkest-gray dev-subhead"><?php print render($content['n_admission_hero_subhead']); ?></span></p>
    </header>
    <div class="asem-ms-hero-img dcf-ratio dcf-ratio-16x9">
      <picture class="dcf-ratio-child dcf-obj-fit-cover">
        <?php print render($content['s_n_hero_image']); ?>
      </picture>
    </div>
		<div class="asem-ms-hero-btn-group dcf-d-flex dcf-flex-wrap dcf-col-gap-3 dcf-row-gap-3 dcf-z-1 asem-ms-hero-btn-group-l" role="group">
      <?php print render($content['s_n_hero_link']); ?>
    </div>
  </div>
</div>


<div class="dcf-bleed dcf-wrapper dcf-pt-8 dcf-pb-4">
    <p class="dcf-w-max-lg dcf-ml-auto dcf-mr-auto dcf-txt-center dcf-txt-lg"><?php print render($content['body']); ?></p>
</div>

<?php print render($content['s_p_supsec_featured']); ?>

<div class="dcf-bleed dcf-overflow-hidden dcf-mb-6">
  <div class="dcf-relative dcf-z-1 dcf-wrapper dcf-pt-4 dcf-pb-9">
		<h2 class="dcf-txt-h4 dcf-mb-4 dcf-regular dcf-uppercase">Stretch Your Strengths</h2>
       <?php print render($content['n_admission_mindsets']); ?>

  </div>
  <div class="dcf-absolute dcf-w-100% dcf-mt-7 unl-bg-gradient-crimson-scarlet unl-slope-t-downward asem-ms-offset-slope-bg dcf-clear-both">
    <div class="dcf-h-100% dcf-w-100% unl-bg-grit"></div>
  </div>
</div>


<?php print render($content['n_admission_college_specific']); ?>



<h2 class="dcf-txt-h4 dcf-mb-0 dcf-regular dcf-uppercase">Scholarships</h2>
  <?php print render($content['n_admission_scholarship']); ?>


<div class="dcf-bleed dcf-wrapper unl-bg-darkest-gray unl-bg-grit dcf-pt-6 dcf-pb-6">
		<h2 class="dcf-txt-h4 dcf-mb-4 dcf-regular dcf-uppercase unl-cream dcf-txt-center">Contact Us</h2>
  <?php if (count($content['s_n_contacts']['#items']) == 1): ?>
  <div class="dcf-d-flex dcf-jc-center">
    <div class="dcf-w-max-lg">
       <?php print render($content['s_n_contacts']); ?>
    </div>
  </div>
  <?php else: ?>
  <div class="dcf-d-flex dcf-jc-center">
    <div class="dcf-w-max-xl">
  <div class="dcf-grid-halves@md dcf-col-gap-vw dcf-row-gap-6">
       <?php print render($content['s_n_contacts']); ?>
  </div>
    </div>
  </div>
  <?php  endif; ?>
  	<div class="dcf-d-flex dcf-jc-center dcf-pt-6 dcf-pb-4">
    <div class="dcf-w-max-xl tl-hero-btn-group dcf-d-flex dcf-flex-wrap dcf-col-gap-3 dcf-row-gap-3 dcf-z-1 tl-hero-btn-group-l" role="group">
      <?php print render($content['s_n_hero_link']); ?>
    </div>
  </div>
</div>

</div>

