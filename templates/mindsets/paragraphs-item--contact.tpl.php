<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="content dcf-grid dcf-col-gap-5 dcf-row-gap-5"<?php print $content_attributes; ?>>
    <div class="dcf-col-25%-start">
      <?php print render($content['p_n_contact_image']); ?>
    </div>
    <div class="dcf-col-75%-end">
      <h6 class="dcf-mb-0 unl-cream"><?php print render($content['p_n_contact_name']); ?></h6>
      <p class="unl-cream"><?php print render($content['p_n_contact_title']); ?><br>
        <a class="unl-cream" href="tel:+1<?php print str_replace('-', '', $p_n_contact_phone[0]['value']); ?>" aria-label="<?php print implode(' ', str_split(str_replace('-', '.', $p_n_contact_phone[0]['value']))); ?>"><?php print render($content['p_n_contact_phone']); ?></a><br>
        <a class="unl-cream" href="mailto:{{ (content.p_n_contact_email) }}"><?php print render($content['p_n_contact_email']); ?></a>
      </p>
    </div>
  </div>
</div>

