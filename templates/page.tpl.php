<header class="dcf-header" id="dcf-header" role="banner">

    <div class="dcf-wrapper dcf-d-flex dcf-flex-row dcf-flex-nowrap dcf-jc-between" style="border-bottom: 1px solid rgba(104,0,0,.1);">
        <?php include(DRUPAL_ROOT . "/wdn/templates_5.0/includes/global/institution.html"); ?>
        <?php include(DRUPAL_ROOT . "/wdn/templates_5.0/includes/global/nav-global.html"); ?>
        <?php include(DRUPAL_ROOT . "/wdn/templates_5.0/includes/global/idm.html"); ?>
        <?php include(DRUPAL_ROOT . "/wdn/templates_5.0/includes/global/search.html"); ?>
    </div>

    <div class="dcf-wrapper dcf-logo dcf-d-flex dcf-ai-center dcf-pt-5 dcf-pb-5 dcf-overflow-hidden">
        <?php include(DRUPAL_ROOT . "/wdn/templates_5.0/includes/global/logo.html"); ?>
        <div class="dcf-d-flex dcf-flex-col dcf-jc-center dcf-flex-grow-1 dcf-h-100%">
            <div class="dcf-mb-1 dcf-txt-sm dcf-lh-3" id="dcf-site-affiliation">
                <!-- InstanceBeginEditable name="affiliation" -->
                <?php if ($site_slogan): ?><?php print $site_slogan; ?><?php endif; ?>
                <!-- InstanceEndEditable -->
            </div>
            <div class="dcf-site-title dcf-bold dcf-uppercase dcf-lh-2 unl-font-sans" id="dcf-site-title" style="letter-spacing: .032em;">
                <!-- InstanceBeginEditable name="titlegraphic" -->
                <?php if ($site_name): ?><a href="<?php print $front_page; ?>"><?php print $site_name; ?></a><?php endif; ?>
                <!-- InstanceEndEditable -->
            </div>
        </div>
    </div>

    <button class="dcf-p-0 dcf-b-0 dcf-lh-1 dcf-bg-transparent dcf-mobile-nav-toggle dcf-nav-toggle unl-font-sans" id="dcf-menu-toggle" aria-pressed="false" aria-haspopup="true">
      <span class="dcf-d-flex dcf-flex-col dcf-ai-center dcf-jc-center dcf-h-100%">
        <span class="dcf-d-flex dcf-ai-center dcf-jc-center dcf-circle dcf-h-6 dcf-w-6 dcf-mb-1 unl-bg-scarlet">
          <svg class="dcf-icon" aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 48 48">
            <g class="dcf-icon-menu-top">
              <path fill="#fff" d="M46,9H2a2,2,0,0,0,0,4H46a2,2,0,0,0,0-4Z"/>
            </g>
            <g class="dcf-icon-menu-bottom">
              <path fill="#fff" d="M46,35H2a2,2,0,0,0,0,4H46a2,2,0,0,0,0-4Z"/>
            </g>
            <g class="dcf-icon-menu-middle">
              <path fill="#fff" d="M46,22H2a2,2,0,0,0,0,4H46a2,2,0,0,0,0-4Z"/>
            </g>
          </svg>
        </span>
        <span class="dcf-sr-only">Show </span><span class="dcf-txt-sm">Menu</span>
      </span>
    </button>

    <nav class="dcf-wrapper dcf-nav-local" role="navigation" aria-label="local navigation">
        <!-- InstanceBeginEditable name="navlinks" -->
        <?php print render($page['navlinks']); ?>
        <!-- InstanceEndEditable -->
    </nav>

</header>

<main class="dcf-wrapper" id="dcf-main" role="main" tabindex="-1">

    <div class="dcf-stretch unl-stripe-b-white">
        <div class="dcf-wrapper dcf-pt-10 dcf-pb-7">
            <nav class="dcf-breadcrumbs" id="dcf-breadcrumbs" role="navigation" aria-label="breadcrumbs">
                <ol class="dcf-list-bare dcf-d-flex dcf-flex-wrap dcf-mb-0 dcf-lh-2 unl-font-sans" style="font-size: .7em;">
                    <!-- InstanceBeginEditable name="breadcrumbs" -->
                    <?php if ($breadcrumb): ?><?php print $breadcrumb; ?><?php endif; ?>
                    <!-- InstanceEndEditable -->
                </ol>
            </nav>

            <div id="dcf-page-title">
                <!-- InstanceBeginEditable name="pagetitle" -->
                <?php print render($title_prefix); ?>
                <?php if ($title): ?><h1 <?php if ($unl_hide_page_title): ?> class="wdn-text-hidden"<?php endif; ?>><?php print $title; ?></h1><?php endif; ?>
                <?php print render($title_suffix); ?>
                <!-- InstanceEndEditable -->
            </div>
        </div>
    </div>

    <!-- InstanceBeginEditable name="maincontentarea" -->
    <?php print $messages; ?>
    <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

    <?php print render($page['content_top']); ?>

    <?php print render($page['content']); ?>

    <?php print render($page['content_bottom']); ?>
    <!-- InstanceEndEditable -->

</main>
<footer class="dcf-footer" id="dcf-footer" role="contentinfo">
    <!-- InstanceBeginEditable name="contactinfo" -->
    <div class="dcf-wrapper dcf-footer dcf-footer-local dcf-d-grid dcf-col-gap-vw dcf-row-gap-md dcf-pt-8 dcf-pb-8" id="dcf-footer-local">
        <h2 class="dcf-site-title dcf-mb-0 dcf-bold dcf-uppercase dcf-lh-2 dcf-inverse unl-footer-local-heading" style="letter-spacing: .032em;"><?php print $site_name; ?></h2>

        <?php if ($page['contactinfo']): ?>
        <div class="unl-footer-local">
            <?php print render($page['contactinfo']); ?>
        </div>
        <?php endif; ?>

        <?php if ($page['contactinfo_additional']): ?>
        <div class="unl-footer-local">
            <?php print render($page['contactinfo_additional']); ?>
        </div>
        <?php endif; ?>

        <?php if ($page['socialmedia']): ?>
        <div class="unl-footer-local">
            <?php print render($page['socialmedia']); ?>
        </div>
        <?php endif; ?>

        <?php if ($page['leftcollinks']): ?>
        <div class="unl-footer-local">
            <?php print render($page['leftcollinks']); ?>
        </div>
        <?php endif; ?>

    </div>
    <!-- InstanceEndEditable -->
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.0/includes/global/footer-global.html"); ?>
</footer>
