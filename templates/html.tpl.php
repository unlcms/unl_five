<!DOCTYPE html>
<html class="no-js" lang="<?php print $language->language; ?>">
<head>
  <?php require(DRUPAL_ROOT."/wdn/templates_5.0/includes/global/meta.html"); ?>
  <title><?php print $head_title; ?></title>
  <?php require(DRUPAL_ROOT."/wdn/templates_5.0/includes/global/css.html"); ?>
  <?php require(DRUPAL_ROOT."/wdn/templates_5.0/includes/global/js-head.html"); ?>
  <?php require(DRUPAL_ROOT."/wdn/templates_5.0/includes/global/favicon.html"); ?>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="unl <?php print $classes; ?>" data-version="5.0" <?php print $attributes;?>>
<?php require(DRUPAL_ROOT."/wdn/templates_5.0/includes/global/skip-nav.html"); ?>

<?php print $page_top; ?>
<?php print $page; ?>
<?php print $page_bottom; ?>

<?php require(DRUPAL_ROOT."/wdn/templates_5.0/includes/global/noscript.html"); ?>
<?php require(DRUPAL_ROOT."/wdn/templates_5.0/includes/global/js-body.html"); ?>
<script>
    require(['dialog'],function(dialogHelper){
        var dialog = document.querySelector('#my-dialog');
        dialogHelper.initialize(dialog);
        dialogHelper.setupShowDialogButton(dialog, document.querySelector('#test-button'));
    });
</script>
</body>
</html>
