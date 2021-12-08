<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="content dcf-d-inline-flex dcf-jc-center dcf-ac-center dcf-col-gap-5 dcf-row-gap-5 dcf-mr-auto dcf-ml-auto"<?php print $content_attributes; ?>>
    <div class="dcf-ratio dcf-ratio-1x1" style="width:150px;">
      <?php print render($content['p_n_contact_image']); ?>
    </div>
    <div class="dcf-d-flex dcf-flex-col dcf-as-center dcf-txt-left">
      <h6 class="dcf-mb-0 unl-cream"><?php print render($content['p_n_contact_name']); ?></h6>
      <p class="dcf-mb-0 unl-cream"><?php print render($content['p_n_contact_title']); ?><br>
        <a class="unl-cream" href="tel:+1<?php print str_replace('-', '', $p_n_contact_phone[0]['value']); ?>" aria-label="<?php print implode(' ', str_split(str_replace('-', '.', $p_n_contact_phone[0]['value']))); ?>"><?php print render($content['p_n_contact_phone']); ?></a><br>
        <a class="unl-cream" href="mailto:<?php print render($content['p_n_contact_email']); ?>"><?php print render($content['p_n_contact_email']); ?></a>
      </p>
    </div>
  </div>
</div>

