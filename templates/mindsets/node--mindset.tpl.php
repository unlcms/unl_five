<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div class="dcf-bleed wdn-hero asem-ms-hero">
    <div class="wdn-hero-text-container asem-ms-hero-text-container dcf-bg-no-repeat">
      <div class="asem-ms-hero-text dcf-bg-no-repeat">
         <header class="dcf-mb-3">
           <h2 class="asem-ms-hero-heading dcf-txt-h1 dcf-mt-0 dcf-mb-0 unl-cream unl-font-display"><?php print render($content['n_mindset_hero_title']); ?></h2>
           <p class="unl-cream dcf-mt-2"><?php print render($content['n_mindset_hero_text']); ?></p>
         </header>
        </div>
      </div>
    <div class="wdn-hero-picture">
      <?php print render($content['s_n_hero_image']); ?>
    </div>
  </div>


  <div class="dcf-bleed unl-bg-lightest-gray">
    <div class="dcf-wrapper dcf-pt-8 dcf-pb-8 dcf-relative dcf-z-1">
     <?php print render($content['n_mindset_support_sections'][0]); ?>
    </div>
    <div class="dcf-absolute dcf-pin-top dcf-h-100% dcf-w-100% unl-slope-b-downward asem-ms-fade-downward">
    </div>
  </div>


  <div class="dcf-bleed unl-bg-lightest-gray">
    <div class="dcf-wrapper dcf-pt-6 dcf-pb-6 dcf-relative dcf-z-1">
     <?php print render($content['n_mindset_support_sections'][1]); ?>
    </div>
    <div class="dcf-absolute dcf-pin-top dcf-h-100% dcf-w-100% unl-slope-b-upward asem-ms-fade-upward">
    </div>
  </div>

  <div class="dcf-bleed unl-bg-lightest-gray">
    <div class="dcf-d-flex dcf-jc-center">
      <div class="dcf-w-max-md dcf-txt-center unl-bg-scarlet unl-frame-quad dcf-p-6 dcf-txt-center">
        <h5 class="unl-cream">We're here to help you shape your future</h5>
          <a class="dcf-mt-2 dcf-btn dcf-btn-inverse-primary" href="https://admissions.unl.edu/visit/">Visit Nebraska</a> <a class="dcf-mt-2 dcf-btn dcf-btn-inverse-primary" href="https://admissions.unl.edu/apply/">Become A Husker</a>
      </div>
    </div>
  </div>

  <div class="dcf-bleed unl-bg-lightest-gray">
    <div class="dcf-wrapper dcf-pt-6 dcf-pb-6 dcf-relative dcf-z-1">
     <?php print render($content['n_mindset_support_sections'][2]); ?>
    </div>
    <div class="dcf-absolute dcf-pin-top dcf-h-100% dcf-w-100% unl-slope-b-downward asem-ms-fade-downward">
    </div>
  </div>

  <div class="dcf-bleed unl-bg-lightest-gray">
    <div class="dcf-wrapper dcf-pt-6 dcf-pb-6 dcf-relative dcf-z-1">
     <?php print render($content['n_mindset_support_sections'][3]); ?>
    </div>
    <div class="dcf-absolute dcf-pin-top dcf-h-100% dcf-w-100% unl-slope-b-upward asem-ms-fade-upward">
    </div>
  </div>

  <div class="dcf-bleed unl-bg-lightest-gray">
    <div class="dcf-d-flex dcf-jc-center">
      <div class="dcf-w-max-md dcf-txt-center unl-bg-scarlet unl-frame-quad dcf-p-6 dcf-txt-center">
        <h5 class="unl-cream">We're here to help you shape your future</h5>
          <a class="dcf-mt-2 dcf-btn dcf-btn-inverse-primary" href="https://admissions.unl.edu/visit/">Visit Nebraska</a> <a class="dcf-mt-2 dcf-btn dcf-btn-inverse-primary" href="https://admissions.unl.edu/apply/">Become A Husker</a>
      </div>
    </div>
  </div>

  <div class="dcf-bleed unl-bg-lightest-gray">
    <div class="dcf-wrapper dcf-pt-6 dcf-pb-6 dcf-relative dcf-z-1">
     <?php print render($content['n_mindset_support_sections'][4]); ?>
    </div>
    <div class="dcf-absolute dcf-pin-top dcf-h-100% dcf-w-100% unl-slope-b-downward asem-ms-fade-downward">
    </div>
  </div>

  <div class="dcf-bleed unl-bg-lightest-gray">
    <div class="dcf-wrapper dcf-pt-6 dcf-pb-6 dcf-relative dcf-z-1">
     <?php print render($content['n_mindset_support_sections'][5]); ?>
    </div>
    <div class="dcf-absolute dcf-w-100% dcf-mt-10 unl-bg-gradient-crimson-scarlet unl-slope-t-downward tl-offset-slope-bg-low dcf-clear-both">
      <div class="dcf-h-100% dcf-w-100% unl-bg-grit"></div>
    </div>
  </div>


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

