<?php if ($format !== 'partial'): ?>
<header class="dcf-header" id="dcf-header" role="banner">

    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/header-global-1.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/nav-global-1.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/visit-global-1.html"); ?>
    <!-- InstanceBeginEditable name="visitlocal" -->
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/local/visit-local.html"); ?>
    <!-- InstanceEndEditable -->
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/visit-global-2.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/apply-global-1.html"); ?>
    <!-- InstanceBeginEditable name="applylocal" -->
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/local/apply-local.html"); ?>
    <!-- InstanceEndEditable -->
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/apply-global-2.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/give-global-1.html"); ?>
    <!-- InstanceBeginEditable name="givelocal" -->
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/local/give-local.html"); ?>
    <!-- InstanceEndEditable -->
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/give-global-2.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/nav-global-2.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/idm.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/search.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/header-global-2.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/logo-lockup-1.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/site-affiliation-1.html"); ?>
        <!-- InstanceBeginEditable name="affiliation" -->
        <?php if ($site_slogan): ?><?php print $site_slogan; ?><?php endif; ?>
        <!-- InstanceEndEditable -->
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/site-affiliation-2.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/site-title-1.html"); ?>
        <!-- InstanceBeginEditable name="titlegraphic" -->
        <?php if ($site_name): ?><a class="<?php print $site_name_class; ?>" href="<?php print $front_page; ?>"><?php print $site_name; ?></a><?php endif; ?>
        <!-- InstanceEndEditable -->
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/site-title-2.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/logo-lockup-2.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/nav-toggle-group.html"); ?>

    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/nav-menu-1.html"); ?>
        <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/nav-toggle-btn.html"); ?>
        <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/nav-menu-child-1.html"); ?>
            <?php print render($page['navlinks']); ?>
        <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/nav-menu-child-2.html"); ?>
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/nav-menu-2.html"); ?>

    <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
</header>

<main class="dcf-main" id="dcf-main" role="main" tabindex="-1">

    <!-- InstanceBeginEditable name="hero" -->
    <div class="dcf-hero <?php if (array_key_exists('field_unl_hero_size', $node_view)): ?>unl-hero-notch-stripe dcf-d-flex dcf-flex-row dcf-flex-wrap dcf-mb-6 unl-bg-darker-gray<?php else: ?>dcf-hero-default<?php endif; ?><?php if ($unl_hide_page_title): ?> dcf-sr-only<?php endif; ?>">
    <!-- InstanceEndEditable -->
        <div class="dcf-hero-group-1">
            <div class="dcf-breadcrumbs-wrapper">
                <nav class="dcf-breadcrumbs" id="dcf-breadcrumbs" role="navigation" aria-label="breadcrumbs">
                    <!-- InstanceBeginEditable name="breadcrumbs" -->
                    <?php if ($breadcrumb): ?><?php print $breadcrumb; ?><?php endif; ?>
                    <!-- InstanceEndEditable -->
                </nav>
            </div>
            <header class="dcf-page-title" id="dcf-page-title">
                <!-- InstanceBeginEditable name="pagetitle" -->
                <?php print render($title_prefix); ?>
                <?php if (array_key_exists('field_unl_hero_subhead1', $node_view)): ?><?php print render($node_view['field_unl_hero_subhead1']); ?><?php endif; ?>
                <?php if (array_key_exists('field_unl_hero_title', $node_view)): ?><?php print render($node_view['field_unl_hero_title']); ?><?php elseif ($title): ?><h1><?php print $title; ?></h1><?php endif; ?>
                <?php if (array_key_exists('field_unl_hero_subhead2', $node_view)): ?><?php print render($node_view['field_unl_hero_subhead2']); ?><?php endif; ?>
                <?php print render($title_suffix); ?>
                <!-- InstanceEndEditable -->
            </header>
            <!-- InstanceBeginEditable name="herogroup1" -->
            <!-- InstanceEndEditable -->
        </div>
        <!-- InstanceBeginEditable name="herogroup2" -->
        <div class="dcf-hero-group-2<?php if (array_key_exists('field_unl_hero_size', $node_view)): ?> dcf-w-100% <?php print render($node_view['field_unl_hero_size']); ?><?php endif; ?>">
            <?php if (array_key_exists('field_unl_hero_image', $node_view)): ?><?php print render($node_view['field_unl_hero_image']); ?><?php endif; ?>
            <?php if (array_key_exists('field_unl_hero_photo_credit', $node_view)): ?><?php print render($node_view['field_unl_hero_photo_credit']); ?><?php endif; ?>
        </div>
        <!-- InstanceEndEditable -->
    </div>
    <div class="dcf-main-content dcf-wrapper">
    <!-- InstanceBeginEditable name="maincontentarea" -->
    <?php print $messages; ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
<?php endif; ?>
    <?php print render($page['content_top']); ?>

    <?php if ($unl_remove_inner_wrapper): ?><div class="dcf-bleed"><?php endif; ?>

        <?php if ($page['sidebar_first'] xor $page['sidebar_second']): ?>
        <div class="dcf-grid dcf-col-gap-vw">
        <?php elseif ($page['sidebar_first'] && $page['sidebar_second']) : ?>
        <div class="dcf-grid-thirds@md dcf-col-gap-vw">
        <?php endif; ?>

        <?php if($page['sidebar_first']): ?>
        <?php print render($page['sidebar_first']); ?>
        <?php endif; ?>

        <?php if (!isset($page['sidebar_first']['#region']) && isset($page['sidebar_second']['#region'])): ?>
          <div class="dcf-col-100% dcf-col-67%-start@md">
            <?php print render($page['content']); ?>
          </div>
        <?php elseif (isset($page['sidebar_first']['#region']) && !isset($page['sidebar_second']['#region'])): ?>
          <div class="dcf-col-100% dcf-col-67%-end@md">
            <?php print render($page['content']); ?>
          </div>
        <?php else: ?>
        <?php print render($page['content']); ?>
        <?php endif; ?>

        <?php if($page['sidebar_second']): ?>
        <?php print render($page['sidebar_second']); ?>
        <?php endif; ?>

        <?php if ($page['sidebar_first'] || $page['sidebar_second']): ?>
        </div>
        <?php endif; ?>

    <?php if ($unl_remove_inner_wrapper): ?></div><?php endif; ?>

    <?php print render($page['content_bottom']); ?>
<?php if ($format !== 'partial'): ?>
    <!-- InstanceEndEditable -->
    </div>

</main>
<footer class="dcf-footer" id="dcf-footer" role="contentinfo">
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/footer-global-1.html"); ?>
    <!-- InstanceBeginEditable name="contactinfo" -->
    <?php if ($page['contactinfo']): ?>

        <?php print render($page['contactinfo']); ?>

    <?php endif; ?>

    <?php if ($page['leftcollinks']): ?>

        <?php print render($page['leftcollinks']); ?>

    <?php endif; ?>
    <!-- InstanceEndEditable -->
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.1/includes/global/footer-global-2.html"); ?>
</footer>
<?php endif; ?>
