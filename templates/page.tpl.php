<header class="dcf-header dcf-txt-xs" id="dcf-header" role="banner">

    <div class="dcf-header-global dcf-wrapper dcf-d-flex dcf-flex-row dcf-flex-nowrap dcf-jc-between dcf-relative unl-bg-scarlet">
        <?php include(DRUPAL_ROOT . "/wdn/templates_5.0/includes/global/institution.html"); ?>
        <?php include(DRUPAL_ROOT . "/wdn/templates_5.0/includes/global/nav-global.html"); ?>
        <?php include(DRUPAL_ROOT . "/wdn/templates_5.0/includes/global/idm.html"); ?>
        <?php include(DRUPAL_ROOT . "/wdn/templates_5.0/includes/global/search.html"); ?>
    </div>

    <div class="dcf-logo-lockup dcf-wrapper dcf-d-flex dcf-ai-flex-end dcf-relative dcf-overflow-hidden">
        <?php include(DRUPAL_ROOT . "/wdn/templates_5.0/includes/global/logo.html"); ?>
        <div class="dcf-site-group dcf-d-flex dcf-flex-col dcf-jc-center">
            <div class="dcf-site-affiliation dcf-lh-3 dcf-italic dcf-txt-sm" id="dcf-site-affiliation">
                <!-- InstanceBeginEditable name="affiliation" -->
                <?php if ($site_slogan): ?><?php print $site_slogan; ?><?php endif; ?>
                <!-- InstanceEndEditable -->
            </div>
            <div class="dcf-site-title dcf-bold dcf-lh-2 dcf-uppercase unl-font-sans unl-ls-1 unl-site-title-long" id="dcf-site-title">
                <!-- InstanceBeginEditable name="titlegraphic" -->
                <?php if ($site_name): ?><a href="<?php print $front_page; ?>"><?php print $site_name; ?></a><?php endif; ?>
                <!-- InstanceEndEditable -->
            </div>
        </div>
    </div>

    <div class="dcf-nav-bar dcf-relative dcf-modal-parent unl-font-sans">

        <div class="dcf-mobile-toolbar dcf-mobile-toolbar-menu dcf-flex-col dcf-ai-center hrjs">
            <button class="dcf-mobile-toolbar-toggle dcf-mobile-toolbar-toggle-menu dcf-d-flex dcf-flex-col dcf-ai-center dcf-jc-center dcf-w-100% dcf-b-0 dcf-bg-transparent unl-font-sans" id="dcf-menu-toggle" aria-expanded="false">
                <!--       <span class="dcf-d-flex dcf-flex-col dcf-ai-center dcf-jc-center dcf-h-100%"> -->
                <!--             <span class="dcf-d-flex dcf-ai-center dcf-jc-center dcf-h-5 dcf-w-5 dcf-mb-1"> -->
                <svg class="dcf-mobile-toolbar-icon dcf-mobile-toolbar-icon-menu dcf-fill-current" aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 48 48">
                    <g class="dcf-icon-menu-top">
                        <path d="M46,0H2C0.9,0,0,0.9,0,2s0.9,2,2,2h44c1.1,0,2-0.9,2-2S47.1,0,46,0z"/>
                        <!--                   <path d="M46,9H2a2,2,0,0,0,0,4H46a2,2,0,0,0,0-4Z"/> -->
                    </g>
                    <g class="dcf-icon-menu-bottom">
                        <path d="M46,44H2c-1.1,0-2,0.9-2,2s0.9,2,2,2h44c1.1,0,2-0.9,2-2S47.1,44,46,44z"/>
                        <!--                   <path d="M46,35H2a2,2,0,0,0,0,4H46a2,2,0,0,0,0-4Z"/> -->
                    </g>
                    <g class="dcf-icon-menu-middle">
                        <path d="M46,22H2c-1.1,0-2,0.9-2,2s0.9,2,2,2h44c1.1,0,2-0.9,2-2S47.1,22,46,22z"/>
                        <!--                   <path d="M46,22H2a2,2,0,0,0,0,4H46a2,2,0,0,0,0-4Z"/> -->
                    </g>
                </svg>
                <!--             </span> -->
                <span class="dcf-sr-only">Show </span><span class="dcf-mobile-toolbar-label dcf-mobile-toolbar-label-menu">Menu</span>
                <!--       </span> -->
            </button>
        </div>

        <div class="dcf-mobile-toolbar-modal dcf-w-100%" id="dcf-navigation">
            <div class="dcf-nav-local-wrapper dcf-w-100%">
                <nav class="dcf-nav-local dcf-w-100%" role="navigation" aria-label="local navigation">
                    <!-- InstanceBeginEditable name="navlinks" -->
                    <?php print render($page['navlinks']); ?>
                    <!-- InstanceEndEditable -->
                </nav>
                <nav class="dcf-breadcrumbs dcf-txt-sm dcf-d-none" id="dcf-breadcrumbs" role="navigation" aria-label="breadcrumbs">
                    <ol class="dcf-list-bare dcf-mb-0 unl-font-sans">
                        <!-- InstanceBeginEditable name="breadcrumbs" -->
                      <?php if ($breadcrumb): ?><?php print $breadcrumb; ?><?php endif; ?>
                        <!-- InstanceEndEditable -->
                    </ol>
                </nav>
            </div>
        </div>

    </div>

</header>

<main class="dcf-wrapper" id="dcf-main" role="main" tabindex="-1">

    <div class="dcf-stretch">
        <div class="dcf-wrapper dcf-pt-10 dcf-pb-7">

            <div id="dcf-page-title">
                <!-- InstanceBeginEditable name="pagetitle" -->
                <?php print render($title_prefix); ?>
                <?php if ($title): ?><h1 class="dcf-mb-0<?php if ($unl_hide_page_title): ?> wdn-text-hidden<?php endif; ?>"><?php print $title; ?></h1><?php endif; ?>
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
<footer class="dcf-footer dcf-txt-xs" id="dcf-footer" role="contentinfo">
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.0/includes/global/footer-global-1.html"); ?>
    <!-- InstanceBeginEditable name="contactinfo" -->
    <?php if ($page['contactinfo']): ?>

        <?php print render($page['contactinfo']); ?>

    <?php endif; ?>

    <?php if ($page['leftcollinks']): ?>

        <?php print render($page['leftcollinks']); ?>

    <?php endif; ?>
    <!-- InstanceEndEditable -->
    <?php include(DRUPAL_ROOT . "/wdn/templates_5.0/includes/global/footer-global-2.html"); ?>
</footer>
