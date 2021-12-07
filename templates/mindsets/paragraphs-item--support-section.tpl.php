<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>
    <div class="dcf-grid dcf-col-gap-vw dcf-row-gap-5 dcf-mt-6">
    	<div class="dcf-col-100% dcf-col-67%-start@md">
        <h2><?php print render($content['p_n_supsec_title']); ?></h2>
        <p><?php print render($content['p_n_supsec_lead']); ?></p>
      </div>
    </div>

    <?php print render($content['s_p_supsec_featured']); ?>

    <?php print render($content['s_p_supsec_secondary']); ?>

  </div>
</div>

