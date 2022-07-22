<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

<div class="dcf-bleed dcf-bg-white dcf-wrapper dcf-pt-8 dcf-pb-6">
  <h1 class="unl-font-display"><?php print $title; ?></h1>
  <div class="asem-ms-hero-btn-group dcf-d-flex dcf-flex-wrap dcf-col-gap-3 dcf-row-gap-3 dcf-z-1 asem-ms-hero-btn-group-l" role="group">
    <?php print render($content['n_major_hero_link']); ?> <?php print render($content['n_major_4year_link']); ?>
  </div>
</div>

<?php if (count($content['n_major_mediahub_url']['#items'])): ?>
<div class="dcf-bleed dcf-wrapper dcf-bg-white dcf-pt-8 dcf-pb-8">
  <div class="dcf-grid-halves@md dcf-col-gap-vw dcf-row-gap-6">
    <div style="padding-top: 56.25%; overflow: hidden; position:relative; -webkit-box-flex: 1; flex-grow: 1;">
      <iframe style="bottom: 0; left: 0; position: absolute; right: 0; top: 0; border: 0; height: 100%; width: 100%;" src="<?php print trim(render($content['n_major_mediahub_url'])); ?>?format=iframe&autoplay=0" title="Video Player: <?php print render($content['field_n_video_title']); ?>" allowfullscreen></iframe>
    </div>
    <div class="dcf-d-flex dcf-flex-col dcf-jc-center">
      <p class="dcf-txt-h6 dcf-bold"><?php print render($content['n_major_video_title']); ?></p>
      <p class="dcf-txt-lg"><?php print render($content['n_major_video_text']); ?></p>
    </div>
  </div>
</div>
<?php endif; ?>

<div class="dcf-bleed dcf-wrapper dcf-bg-white dcf-pt-4 dcf-pb-4">
  <div class="dcf-grid dcf-col-gap-vw dcf-row-gap-6">
    <div class="dcf-col-100% dcf-col-75%-start@md dcf-d-flex dcf-flex-col dcf-jc-center">
      <div class="dcf-txt-lg"><?php print render($content['n_major_lead_copy']); ?></div>
    </div>
    <?php if (count($content['n_major_areas_emphasis']['#items'])): ?>
    <div class="dcf-col-100% dcf-col-25%-end@md">
      <div class="unl-bg-lightest-gray dcf-p-5 dcf-rounded">
        <h2 class="dcf-txt-h6">Areas of Emphasis</h2>
        <?php print render($content['n_major_areas_emphasis']); ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>

<div class="dcf-bleed dcf-overflow-hidden dcf-pt-6 dcf-pb-6">
  <div class="dcf-relative dcf-z-1 dcf-wrapper dcf-pt-4 dcf-pb-9">
    <div class="dcf-grid-thirds@md dcf-col-gap-vw dcf-row-gap-6">
      <div class="dcf-d-flex dcf-jc-center dcf-b-2">
        <div class="dcf-d-flex dcf-flex-col dcf-flex-nowrap dcf-w-max-md dcf-w-100% dcf-bg-white dcf-rounded unl-box-shadow dcf-b-solid unl-b-lightest-gray">

          <div class="dcf-2nd dcf-d-flex dcf-flex-col dcf-flex-grow-1 dcf-pt-5 dcf-pr-6 dcf-pb-6 dcf-pl-6 unl-darkest-gray dcf-ai-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-labelledby="outline-science-lightbulb-school-science-title" class="dcf-fill-current dcf-w-9"><title id="outline-science-lightbulb-school-science-title">science-lightbulb(school-science)</title><path d="M20 10.5C20 6.364 16.636 3 12.5 3S5 6.364 5 10.5c0 2.872 1.624 5.368 4 6.628V19.5C9 19.776 9.224 20 9.5 20H10v1.5c0 .276.224.5.5.5H12v1.5c0 .276.224.5.5.5s.5-.224.5-.5V22h1.5c.276 0 .5-.224.5-.5V20h.5c.276 0 .5-.224.5-.5v-2.372C18.376 15.868 20 13.372 20 10.5zM14 21h-3v-1h3V21zM15 19h-.5-4H10v-1.438C10.783 17.841 11.622 18 12.5 18s1.717-.159 2.5-.438V19zM12.513 16.888c-.008.034-.012.068-.013.103-.001-.034-.005-.068-.013-.103L11.59 13h1.82L12.513 16.888zM13.534 16.91L14.437 13H15.5c.827 0 1.5-.673 1.5-1.5S16.327 10 15.5 10c-.822 0-1.526.561-1.712 1.362L13.641 12h-2.281l-.147-.638C11.026 10.561 10.322 10 9.5 10 8.673 10 8 10.673 8 11.5S8.673 13 9.5 13h1.063l.902 3.91C8.373 16.412 6 13.731 6 10.5 6 6.916 8.916 4 12.5 4S19 6.916 19 10.5C19 13.731 16.627 16.412 13.534 16.91zM14.667 12l.096-.413C14.843 11.241 15.146 11 15.5 11c.275 0 .5.225.5.5S15.775 12 15.5 12H14.667zM10.333 12H9.5C9.225 12 9 11.775 9 11.5S9.225 11 9.5 11c.354 0 .657.241.737.587L10.333 12zM12.5 2C12.776 2 13 1.776 13 1.5v-1C13 .224 12.776 0 12.5 0S12 .224 12 .5v1C12 1.776 12.224 2 12.5 2zM19.218 3.075l-.707.707c-.195.195-.195.512 0 .707.098.098.226.146.354.146s.256-.049.354-.146l.707-.707c.195-.195.195-.512 0-.707S19.413 2.88 19.218 3.075zM22.5 10h-1c-.276 0-.5.224-.5.5s.224.5.5.5h1c.276 0 .5-.224.5-.5S22.776 10 22.5 10zM19.218 16.511c-.195-.195-.512-.195-.707 0s-.195.512 0 .707l.707.707c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512 0-.707L19.218 16.511zM5.782 4.489C5.88 4.587 6.008 4.636 6.136 4.636s.256-.049.354-.146c.195-.195.195-.512 0-.707L5.782 3.075c-.195-.195-.512-.195-.707 0s-.195.512 0 .707L5.782 4.489zM3.5 10h-1C2.224 10 2 10.224 2 10.5S2.224 11 2.5 11h1C3.776 11 4 10.776 4 10.5S3.776 10 3.5 10zM5.782 16.511l-.707.707c-.195.195-.195.512 0 .707.098.098.226.146.354.146s.256-.049.354-.146l.707-.707c.195-.195.195-.512 0-.707S5.978 16.315 5.782 16.511z"></path><g><path fill="none" d="M0 0H24V24H0z"></path></g></svg>

            <h3 class="dcf-txt-h5 dcf-lh-3 dcf-mt-2">What You'll Learn</h3>
            <div class="dcf-flex-grow-1">
              <?php print render($content['n_major_what_youll_learn']); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="dcf-d-flex dcf-jc-center">
        <div class="dcf-d-flex dcf-flex-col dcf-flex-nowrap dcf-w-max-md dcf-w-100% dcf-bg-white dcf-rounded unl-box-shadow dcf-b-solid unl-b-lightest-gray">
          <div class="dcf-2nd dcf-d-flex dcf-flex-col dcf-flex-grow-1 dcf-pt-5 dcf-pr-6 dcf-pb-6 dcf-pl-6 unl-darkest-gray dcf-ai-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-labelledby="outline-certificate-2-vote-rewards-title"  class="dcf-fill-current dcf-w-9"><title id="outline-certificate-2-vote-rewards-title">certificate-2(vote-rewards)</title><path d="M23.5,0h-23C0.224,0,0,0.224,0,0.5v16C0,16.776,0.224,17,0.5,17H12c0.276,0,0.5-0.224,0.5-0.5S12.276,16,12,16H1V1h22v8 c0,0.276,0.224,0.5,0.5,0.5S24,9.276,24,9V0.5C24,0.224,23.776,0,23.5,0z"></path><path d="M18.5,12c-1.103,0-2,0.897-2,2s0.897,2,2,2s2-0.897,2-2S19.603,12,18.5,12z M18.5,15c-0.552,0-1-0.449-1-1s0.448-1,1-1 s1,0.449,1,1S19.052,15,18.5,15z"></path><path d="M22.83,11.5c-0.454-0.787-1.299-1.213-2.167-1.247C20.222,9.482,19.408,9,18.5,9s-1.723,0.482-2.163,1.254 c-0.004,0-0.008,0-0.013,0c-0.885,0-1.702,0.463-2.153,1.246c-0.455,0.787-0.444,1.732,0.003,2.5 c-0.447,0.769-0.457,1.714-0.004,2.5c0.207,0.359,0.498,0.642,0.83,0.852V23.5c0,0.194,0.112,0.371,0.288,0.453 c0.174,0.082,0.383,0.055,0.532-0.069l2.68-2.233l2.68,2.233C21.271,23.96,21.385,24,21.5,24c0.072,0,0.145-0.016,0.212-0.047 C21.888,23.871,22,23.694,22,23.5v-6.165c0.332-0.207,0.625-0.48,0.83-0.835c0.455-0.787,0.444-1.732-0.004-2.5 C23.274,13.232,23.284,12.287,22.83,11.5z M21,22.433l-2.18-1.817c-0.186-0.154-0.455-0.154-0.641,0L16,22.433v-4.729 c0.109,0.015,0.215,0.043,0.326,0.043c0.004,0,0.008,0,0.012,0C16.779,18.519,17.593,19,18.5,19c0.908,0,1.722-0.482,2.164-1.254 c0.113-0.003,0.224-0.032,0.336-0.049V22.433z M21.965,16c-0.31,0.538-0.91,0.825-1.527,0.728 c-0.227-0.033-0.457,0.094-0.542,0.312C19.668,17.623,19.12,18,18.5,18s-1.167-0.376-1.394-0.958 c-0.075-0.194-0.262-0.319-0.466-0.319c-0.024,0-0.051,0.002-0.076,0.006c-0.616,0.098-1.219-0.192-1.528-0.729 s-0.258-1.199,0.133-1.688c0.147-0.183,0.146-0.443,0-0.625C14.778,13.2,14.727,12.538,15.037,12 c0.309-0.537,0.901-0.823,1.526-0.727c0.232,0.037,0.458-0.094,0.542-0.313C17.332,10.376,17.879,10,18.5,10 s1.168,0.376,1.395,0.958c0.085,0.218,0.316,0.351,0.542,0.313c0.617-0.094,1.217,0.19,1.528,0.729 c0.31,0.538,0.258,1.2-0.134,1.687c-0.147,0.183-0.147,0.443,0,0.626C22.223,14.8,22.275,15.462,21.965,16z"></path><path d="M21.5,8.5C21.776,8.5,22,8.276,22,8V5.5C22,5.224,21.776,5,21.5,5C20.121,5,19,3.878,19,2.5C19,2.224,18.776,2,18.5,2 h-13C5.224,2,5,2.224,5,2.5C5,3.878,3.879,5,2.5,5C2.224,5,2,5.224,2,5.5v6C2,11.776,2.224,12,2.5,12C3.879,12,5,13.122,5,14.5 C5,14.776,5.224,15,5.5,15H12c0.276,0,0.5-0.224,0.5-0.5S12.276,14,12,14H5.965C5.744,12.469,4.53,11.255,3,11.036V5.964 C4.53,5.745,5.744,4.531,5.965,3h12.07C18.256,4.531,19.47,5.745,21,5.964V8C21,8.276,21.224,8.5,21.5,8.5z"></path><g><path fill="none" d="M0 0H24V24H0z"></path></g></svg>
            <h3 class="dcf-txt-h5 dcf-lh-3 dcf-mt-2">Learning Outcomes</h3>
            <div class="dcf-flex-grow-1">
              <?php print render($content['n_major_learning_outcomes']); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="dcf-d-flex dcf-jc-center">
        <div class="dcf-d-flex dcf-flex-col dcf-flex-nowrap dcf-w-max-md dcf-w-100% dcf-bg-white dcf-rounded unl-box-shadow dcf-b-solid unl-b-lightest-gray">
          <div class="dcf-2nd dcf-d-flex dcf-flex-col dcf-flex-grow-1 dcf-pt-5 dcf-pr-6 dcf-pb-6 dcf-pl-6 unl-darkest-gray dcf-ai-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-labelledby="outline-network-people-business-title" class="dcf-fill-current dcf-w-9"><title id="outline-network-people-business-title">network-people(business)</title><path d="M13.812 12.399c.724-.548 1.199-1.409 1.199-2.385 0-1.654-1.346-3-3-3s-3 1.346-3 3c0 .975.475 1.834 1.197 2.383-1.585.697-2.697 2.277-2.697 4.117 0 .276.224.5.5.5h8c.007 0 .015 0 .02 0 .276 0 .5-.224.5-.5 0-.052-.008-.102-.021-.148C16.45 14.59 15.354 13.077 13.812 12.399zM10.011 10.015c0-1.103.897-2 2-2s2 .897 2 2-.897 2-2 2S10.011 11.118 10.011 10.015zM8.546 16.015c.244-1.694 1.705-3 3.465-3s3.221 1.306 3.465 3H8.546zM17.011 7.521c.127 0 .255-.048.353-.146l2.796-2.778C20.55 4.85 21.012 5 21.511 5c1.379 0 2.5-1.122 2.5-2.5S22.89 0 21.511 0s-2.5 1.122-2.5 2.5c0 .519.159 1.001.431 1.401l-2.783 2.765c-.195.194-.197.511-.002.707C16.754 7.471 16.882 7.521 17.011 7.521zM21.511 1c.827 0 1.5.673 1.5 1.5S22.338 4 21.511 4s-1.5-.673-1.5-1.5S20.684 1 21.511 1zM21.521 19c-.519 0-1.001.159-1.401.431l-1.793-1.804c-.194-.196-.511-.196-.707-.002s-.196.511-.002.707l1.806 1.817c-.252.391-.402.853-.402 1.351 0 1.378 1.121 2.5 2.5 2.5s2.5-1.122 2.5-2.5S22.9 19 21.521 19zM21.521 23c-.827 0-1.5-.673-1.5-1.5s.673-1.5 1.5-1.5 1.5.673 1.5 1.5S22.349 23 21.521 23zM2.511 5C3.01 5 3.472 4.85 3.862 4.597l2.796 2.778c.098.097.226.146.353.146.129 0 .257-.049.354-.148C7.561 7.177 7.559 6.86 7.363 6.666L4.58 3.901c.271-.4.431-.882.431-1.401 0-1.378-1.121-2.5-2.5-2.5s-2.5 1.122-2.5 2.5S1.132 5 2.511 5zM2.511 1c.827 0 1.5.673 1.5 1.5S3.338 4 2.511 4s-1.5-.673-1.5-1.5S1.684 1 2.511 1zM5.694 17.627l-1.793 1.804C3.501 19.159 3.019 19 2.5 19 1.121 19 0 20.122 0 21.5S1.121 24 2.5 24 5 22.878 5 21.5c0-.498-.15-.96-.402-1.351l1.806-1.817c.194-.195.194-.512-.002-.707S5.889 17.431 5.694 17.627zM2.5 23C1.673 23 1 22.327 1 21.5S1.673 20 2.5 20 4 20.673 4 21.5 3.327 23 2.5 23zM16.511 12h2.551c.232 1.14 1.241 2 2.449 2 1.379 0 2.5-1.122 2.5-2.5S22.89 9 21.511 9c-1.208 0-2.217.86-2.449 2h-2.551c-.276 0-.5.224-.5.5S16.234 12 16.511 12zM21.511 10c.827 0 1.5.673 1.5 1.5s-.673 1.5-1.5 1.5-1.5-.673-1.5-1.5S20.684 10 21.511 10zM2.511 14c1.208 0 2.217-.86 2.449-2h2.551c.276 0 .5-.224.5-.5S7.787 11 7.511 11H4.96C4.728 9.86 3.719 9 2.511 9c-1.379 0-2.5 1.122-2.5 2.5S1.132 14 2.511 14zM2.511 10c.827 0 1.5.673 1.5 1.5S3.338 13 2.511 13s-1.5-.673-1.5-1.5S1.684 10 2.511 10z"></path><g><path fill="none" d="M0 0H24V24H0z"></path></g></svg>
            <h3 class="dcf-txt-h5 dcf-lh-3 dcf-mt-2">Career Connections</h3>
            <div class="dcf-flex-grow-1">
              <?php print render($content['n_major_career_connections']); ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="dcf-absolute dcf-w-100% dcf-mt-7 unl-bg-gradient-crimson-scarlet unl-slope-t-downward asem-ms-offset-slope-bg dcf-clear-both">
    <div class="dcf-h-100% dcf-w-100% unl-bg-grit"></div>
  </div>
</div>

<?php if (count($content['n_major_point_pride']['#items'])): ?>
<div class="dcf-bleed dcf-bg-white dcf-wrapper dcf-pt-6 dcf-pb-6">
<?php endif; ?>
  <?php if (count($content['n_major_point_pride']['#items']) == 1): ?>
  <div class="dcf-d-flex dcf-jc-center">
    <div class="dcf-w-max-md">
      <?php print render($content['n_major_point_pride']); ?>
    </div>
  </div>
  <?php elseif (count($content['n_major_point_pride']['#items']) == 2): ?>
  <div class="dcf-d-flex dcf-jc-center">
    <div class="dcf-w-max-lg">
      <div class="dcf-grid-halves@sm dcf-col-gap-vw dcf-row-gap-6">
        <?php print render($content['n_major_point_pride']); ?>
      </div>
    </div>
  </div>
  <?php elseif (count($content['n_major_point_pride']['#items']) == 3): ?>
  <div class="dcf-d-flex dcf-jc-center">
    <div class="dcf-w-max-xl">
      <div class="dcf-grid-thirds@md dcf-col-gap-vw dcf-row-gap-6">
        <?php print render($content['n_major_point_pride']); ?>
      </div>
    </div>
  </div>
  <?php elseif (count($content['n_major_point_pride']['#items']) == 4): ?>

  <div class="dcf-grid-halves@sm dcf-grid-fourths@md dcf-col-gap-vw dcf-row-gap-6">
    <?php print render($content['n_major_point_pride']); ?>
  </div>
  <?php endif; ?>
<?php if (count($content['n_major_point_pride']['#items'])): ?>
</div>
<?php endif; ?>

<div class="dcf-bleed unl-bg-lightest-gray unl-bg-grit dcf-wrapper dcf-pt-8 dcf-pb-8">
  <h2>How You’ll Learn</h2>
  <div class="dcf-grid-halves@sm dcf-grid-thirds@md dcf-col-gap-vw dcf-row-gap-6 dcf-pt-4">
    <div class="dcf-bt-solid dcf-bt-3 unl-bt-scarlet dcf-p-5 dcf-bg-white">
      <h3 class="dcf-txt-h5 dcf-bold">Hands-On Learning Experiences</h3>
      <?php print render($content['n_major_hands_on']); ?>
    </div>
    <div class="dcf-bt-solid dcf-bt-3 unl-bt-scarlet dcf-p-5 dcf-bg-white">
      <h3 class="dcf-txt-h5 dcf-bold">Transferrable Career Skills</h3>
      <?php print render($content['n_major_career_skills']); ?>
    </div>
    <div class="dcf-bt-solid dcf-bt-3 unl-bt-scarlet dcf-p-5 dcf-bg-white">
      <h3 class="dcf-txt-h5 dcf-bold">Social Connections</h3>
      <?php print render($content['n_major_social_connections']); ?>
    </div>
    <div class="dcf-bt-solid dcf-bt-3 unl-bt-scarlet dcf-p-5 dcf-bg-white">
      <h3 class="dcf-txt-h5 dcf-bold">Making a Difference</h3>
      <?php print render($content['n_major_make_difference']); ?>
    </div>
    <div class="dcf-bt-solid dcf-bt-3 unl-bt-scarlet dcf-p-5 dcf-bg-white">
      <h3 class="dcf-txt-h5 dcf-bold">Core Academics</h3>
      <?php print render($content['n_major_core_academics']); ?>
    </div>
    <div class="dcf-bt-solid dcf-bt-3 unl-bt-scarlet dcf-p-5 dcf-bg-white">
      <h3 class="dcf-txt-h5 dcf-bold">Research / Grad School Prep</h3>
      <?php print render($content['n_major_research_grad_prep']); ?>
    </div>
  </div>
</div>


<h2 class="dcf-wrapper dcf-pt-4">Core Academic Experiences</h2>
<div class="dcf-bleed dcf-d-grid unl-grid-cols dcf-pt-4 dcf-pb-8 dcf-ai-center">
  <div class="dcf-2nd dcf-pt-6 dcf-pl-7 dcf-pb-6 dcf-pr-7 dcf-z-1 dev-bg-scarlet-gradient-transparent dev-section-featured-region-2">
    <div class="unl-cream"><?php print render($content['n_major_core_academic_text']); ?></div>
  </div>
  <div class="dcf-1st dcf-relative dev-section-featured-region-1">
    <div class="dcf-ratio dcf-ratio-16x9 tl-bg-block mobile-img-width">
      <?php print render($content['n_major_core_academic_image']); ?>
    </div>
    <div class="dcf-absolute dcf-pin-top dcf-pin-left dcf-ratio dcf-ratio-16x9 asem-ms-z-neg1 asem-ms-bg-block asem-ms-bg-block-lt mobile-screen">
      <div class="dcf-ratio-child unl-bg-dots-gray"></div>
    </div>
  </div>
</div>

<?php if (count($content['s_p_supsec_secondary']['#items'])): ?>
<div class="dcf-bleed unl-bg-lightest-gray">
  <div class="dcf-wrapper dcf-pt-8 dcf-pb-8 dcf-relative dcf-z-1">
    <?php if (count($content['n_major_res_aca_alt_title']['#items'])): ?>
      <h2 class="dcf-mb-0"><?php print render($content['n_major_res_aca_alt_title']); ?>}</h2>
    <?php else: ?>
      <h2 class="dcf-mb-0">Research and Academic Opportunities</h2>
    <?php endif; ?>
    <?php print render($content['s_p_supsec_secondary']); ?>
    <?php if (count($content['n_major_research_academic_link']['#items'])): ?>
      <?php print render($content['n_major_research_academic_link']); ?>
    <?php endif; ?>
  </div>
  <div class="dcf-absolute dcf-pin-top dcf-h-100% dcf-w-100% unl-slope-b-upward asem-ms-fade-upward">
  </div>
</div>
<?php endif; ?>

<?php if (count($content['n_major_study_abroad']['#items'])): ?>
<div class="dcf-bleed unl-bg-lightest-gray dcf-wrapper dcf-pt-8 dcf-pb-8">
  <h2 class="dcf-mb-0">Study Abroad Opportunities</h2>
  <div class="dcf-grid-halves@md dcf-col-gap-vw dcf-row-gap-6 dcf-pt-4 dcf-pb-4">
    <?php print render($content['n_major_study_abroad']); ?>
  </div>
  <?php if (count($content['n_major_study_abroad_link']['#items'])): ?>
    <?php print render($content['n_major_study_abroad_link']); ?>
  <?php endif; ?>
</div>
<?php endif; ?>

<?php if (count($content['n_major_student_org_title_1']['#items'])): ?>
<div class="dcf-bleed dcf-bg-white dcf-wrapper dcf-pt-8 dcf-pb-8">
  <h2>Student / Professional Organizations</h2>
  <?php if (count($content['n_major_student_org_title_2']['#items'])): ?>
  <div class="dcf-grid-halves@md dcf-col-gap-vw dcf-row-gap-6 dcf-pt-4 dcf-pb-4">
    <div>
      <p class="dcf-txt-h6 dcf-bold"><?php print render($content['n_major_student_org_title_1']); ?></p>
      <p><?php print render($content['n_major_student_org_text_1']); ?></p>
    </div>
    <div>
      <p class="dcf-txt-h6 dcf-bold"><?php print render($content['n_major_student_org_title_2']); ?></p>
      <p><?php print render($content['n_major_student_org_text_2']); ?></p>
    </div>
  </div>
  <?php elseif (count($content['n_major_student_org_title_1']['#items'])): ?>
  <div class="dcf-d-flex dcf-jc-center">
    <div class="dcf-w-max-xl dcf-txt-center">
      <p class="dcf-txt-h6 dcf-bold"><?php print render($content['n_major_student_org_title_2']); ?></p>
      <p><?php print render($content['n_major_student_org_text_1']); ?></p>
    </div>
  </div>
  <?php endif; ?>
  <?php if (count($content['n_major_student_orgs_link']['#items'])): ?>
    <?php print render($content['n_major_student_orgs_link']); ?>
  <?php endif; ?>
</div>
<?php endif; ?>

<div class="dcf-bleed dcf-bg-white dcf-wrapper unl-bg-lightest-gray unl-bg-grit dcf-pt-8 dcf-pb-8">
  <div class="dcf-grid-thirds@md dcf-col-gap-vw dcf-row-gap-6 dcf-pt-4">
    <?php print render($content['n_major_career_paths']); ?>
  </div>
</div>

<?php if (count($content['n_major_custom']['#items'])): ?>
  <?php print render($content['n_major_custom']); ?>
<?php endif; ?>

<div class="dcf-bleed dcf-bg-white">
  <div class="dcf-wrapper dcf-pt-8 dcf-pb-8">
    <h2>4-Year Plan and Notable Courses</h2>
    <div class="dcf-w-max-xl dcf-pt-2 dcf-pb-4">
      <?php print render($content['n_major_courses_lead']); ?>
      <?php print render($content['n_major_4year_link']); ?>
    </div>
    <div class="dcf-grid-halves@sm dcf-col-gap-vw dcf-row-gap-6 dcf-pt-4">
      <?php print render($content['n_major_notable_courses']); ?>
    </div>
  </div>
</div>

<div class="dcf-bleed dcf-wrapper unl-bg-darkest-gray unl-bg-grit dcf-pt-6 dcf-pb-6">
  <h2 class="dcf-txt-h4 dcf-mb-4 dcf-regular dcf-uppercase unl-cream dcf-txt-center">Contact Us</h2>
  <?php if (count($content['s_n_contacts']['#items']) == 1): ?>
  <div class="dcf-d-flex dcf-jc-center">
    <div class="dcf-w-max-lg dcf-w-100% dcf-txt-center">
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
  <?php endif; ?>
  <div class="dcf-d-flex dcf-jc-center dcf-pt-6 dcf-pb-4">
    <div class="dcf-w-max-xl tl-hero-btn-group dcf-d-flex dcf-flex-wrap dcf-col-gap-3 dcf-row-gap-3 dcf-z-1 tl-hero-btn-group-l" role="group">
      <?php print render($content['n_major_hero_link']); ?> <?php print render($content['n_major_infovisit_link']); ?>
    </div>
  </div>
</div>

</div>
