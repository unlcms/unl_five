<?php if ($format !== 'partial'): ?><!DOCTYPE html>
<html class="no-js" lang="<?php print $language->language; ?>"><!-- InstanceBegin template="/Templates/fixed.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<?php require(DRUPAL_ROOT."/wdn/templates_5.0/includes/global/head-1.html"); ?>
<!-- InstanceBeginEditable name="doctitle" -->
  <title><?php print $head_title; ?></title>
<!-- InstanceEndEditable -->
<?php require(DRUPAL_ROOT."/wdn/templates_5.0/includes/global/head-2.html"); ?>
<!-- InstanceBeginEditable name="head" -->
<?php print $head; ?>
<?php print $styles; ?>
<?php print $scripts; ?>
<?php print theme_get_setting('head_html'); ?>
<!-- InstanceEndEditable -->
</head>
<body class="unl <?php print $classes; ?>" data-version="5.0" <?php print $attributes;?>>
<?php require(DRUPAL_ROOT."/wdn/templates_5.0/includes/global/skip-nav.html"); ?>

<?php print $page_top; ?>
<?php endif; ?>
<?php print $page; ?>
<?php if ($format !== 'partial'): ?>
<?php require(DRUPAL_ROOT."/wdn/templates_5.0/includes/global/noscript.html"); ?>
<?php require(DRUPAL_ROOT."/wdn/templates_5.0/includes/global/js-body.html"); ?>
<!-- InstanceBeginEditable name="jsbody" -->
<?php print $page_bottom; ?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
<?php endif; ?>
