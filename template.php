<?php

require_once dirname(__FILE__) . '/includes/forms.inc';

/**
 * Implements hook_block_view_alter().
 */
function unl_five_block_view_alter(&$data, $block) {
  if ($block->module == 'system' && $block->delta == 'main-menu') {
    return _unl_five_block_view_system_main_menu_alter($data, $block);
  }
}

/**
 * Tries to implement hook_block_view_MODULE_DELTA_alter, but since the delta contains a -,
 * this is actually called from unl_block_view_alter() for now. See http://drupal.org/node/1076132
 */
function _unl_five_block_view_system_main_menu_alter(&$data, $block) {
  $data['content'] = _unl_five_limit_menu_depth($data['content'], 2);
}

/**
 * Remove any menu items that are more than $depth levels below the current root.
 */
function _unl_five_limit_menu_depth($menu_links, $depth) {
  if ($depth == 0) {
    return array();
  }

  foreach (element_children($menu_links) as $index) {
    $menu_links[$index]['#below'] = _unl_five_limit_menu_depth($menu_links[$index]['#below'], $depth - 1);
  }

  return $menu_links;
}

/**
 * Implementation of hook_html_head_alter().
 */
function unl_five_html_head_alter(&$head_elements) {
  // Remove due to w3c error: <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  unset($head_elements['system_meta_content_type']);

  $home_path = '<front>';

  // If <link rel="home"> has already been set elsewhere (in a Context for example) then return...
  foreach ($head_elements as $key => $element) {
    if ($element["#tag"] == 'link' && isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'home') {
      return;
    }
  }

  // ...otherwise add a <link rel="home"> tag with the front page as the href attribute
  $element = array(
    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'home',
      'href' => url($home_path, array('absolute' => TRUE)),
    ),
    '#type' => 'html_tag'
  );
  $head_elements['drupal_add_html_head_link:home'] = $element;
}

/**
 * Implements hook_css_alter().
 */
function unl_five_css_alter(&$css) {
  if (!theme_get_setting('unl_affiliate')) {
    unset($css[drupal_get_path('theme', 'unl_five') . '/css/colors.css']);
  }
}

/**
 * Implements template_preprocess().
 */
function unl_five_preprocess(&$vars) {
  // For checking the presence of ?format=partial in any template, which is used
  // to output the page without UNL's header and footer (for embedding in other pages, etc).
  $vars['format'] = filter_input(INPUT_GET, 'format', FILTER_SANITIZE_STRING);
}

/**
 * Implements template_preprocess_block().
 */
function unl_five_preprocess_block(&$vars) {
  // Add Menu Block class to book navigation block so that they can share CSS.
  if ($vars['block_html_id'] == 'block-book-navigation') {
    $vars['classes_array'][] = 'block-menu-block';
  }
  // Add .wdn-sans-serif to menu blocks.
  if ($vars['block_html_id'] == 'block-book-navigation' || substr($vars['block_html_id'], 0, 16) == 'block-menu-block' ) {
    $vars['classes_array'][] = 'wdn-sans-serif';
    $vars['title_attributes_array']['class'][] = 'wdn-sans-serif';
  }
}

/**
 * Implements template_preprocess_field().
 */
function unl_five_preprocess_field(&$vars, $hook) {
  $element = $vars['element'];
  // Set the field label tag to a header or default to div
  if (strlen($element['#label_display']) == 2 && substr($element['#label_display'], 0, 1) == 'h') {
    $vars['label_html_tag'] = $element['#label_display'];
  }
  else {
    $vars['label_html_tag'] = 'div';
  }

  // Force hide field label of field_wdn_band_bg
  if ($vars['element']['#field_name'] == 'field_wdn_band_bg') {
    $vars['element']['#label_display'] = 'hidden';
    $vars['label_hidden'] = TRUE;
  }
}

/**
 * Implements template_preprocess_image().
 */
function unl_five_preprocess_image(&$vars) {
  // If the image style name begins with 'wdn_band_bg' then stretch it.
  if (isset($vars['style_name']) && substr($vars['style_name'], 0, 11) == 'wdn_band_bg') {
    $vars['attributes']['class'][] = 'wdn-stretch';
  }
}

/**
 * Implements template_preprocess_html().
 */
function unl_five_preprocess_html(&$vars, $hook) {
  // Add the CSS and JS files that are generated from the unl_five appearance settings page
  foreach (array('css', 'js') as $type) {
    $file = variable_get('unl_custom_code_path', 'public://custom') . '/custom_unl_five.' . $type;
    if (is_file($file) && $type == 'css') {
      $func = 'drupal_add_'.$type;
      $func($file, array('type' => 'file', 'group' => CSS_THEME, 'every_page' => TRUE));
    }
    elseif (is_file($file)) {
      drupal_add_js($file, array('scope' => 'footer', 'type' => 'file', 'group' => JS_THEME, 'every_page' => TRUE));
    }
  }

  // Affiliate Template
  if (theme_get_setting('unl_affiliate')) {
    drupal_add_css(drupal_get_path('module', 'unl_five') . '/css/colors.css', array('type' => 'file', 'group' => CSS_THEME, 'every_page' => TRUE));

    if (theme_get_setting('toggle_logo') && !theme_get_setting('default_logo')) {
      $logo_css = '#header #logo{background-image:url('.file_create_url(theme_get_setting('logo_path')).'); background-position:13px 10px;}
                   @media (max-width:1040px) {#header #logo{background-size:90%; background-position:2px 3px;}}';
      drupal_add_css($logo_css, array('type' => 'inline', 'group' => CSS_THEME, 'every_page' => TRUE));
    }
    if (!theme_get_setting('toggle_unl_banner')) {
      drupal_add_css('#wdn_institution_title{visibility:hidden;}', array('type' => 'inline', 'group' => CSS_THEME, 'every_page' => TRUE));
    }
    if (!theme_get_setting('toggle_unl_branding')) {
      drupal_add_css('#footer_floater,#wdn_copyright #wdn_logos{display:none;}', array('type' => 'inline', 'group' => CSS_THEME, 'every_page' => TRUE));
    }
    if (!theme_get_setting('toggle_unl_breadcrumb')) {
      drupal_add_css('#breadcrumbs > ul > li:first-child{display:none;}', array('type' => 'inline', 'group' => CSS_THEME, 'every_page' => TRUE));
    }
    if (!theme_get_setting('toggle_unl_search')) {
      drupal_add_css('#wdn_search{display:none;}', array('type' => 'inline', 'group' => CSS_THEME, 'every_page' => TRUE));
    }
    if (!theme_get_setting('toggle_unl_tools')) {
      drupal_add_css('#wdn_tool_links{display:none;}', array('type' => 'inline', 'group' => CSS_THEME, 'every_page' => TRUE));
    }
  }

  if (!module_exists('metatag')) {
    // Set the <title> tag to UNL format: Page Title | Site Name | Nebraska
    if ($vars['is_front']) {
      unset($vars['head_title_array']['title']);
    }
    else if (theme_get_setting('site_name_abbreviation')) {
      $vars['head_title_array']['name'] = theme_get_setting('site_name_abbreviation');
    }
    if (variable_get('site_name') != 'University of Nebraska–Lincoln') {
      $vars['head_title_array'] = array_merge($vars['head_title_array'], array('UNL' => 'Nebraska'));
    }
    $vars['head_title'] = implode(' | ', $vars['head_title_array']);
  }
}

/**
 * Implements template_process_html().
 */
function unl_five_process_html(&$vars) {
  // Hook into color.module.
  if (theme_get_setting('unl_affiliate') && module_exists('color')) {
    _color_html_alter($vars);
  }

  // Template suggestion for the Speedy template.
  if (theme_get_setting('unl_speedy')) {
    $vars['theme_hook_suggestions'][] = 'html__speedy';
  }
}

/**
 * Implements template_preprocess_region().
 */
function unl_five_preprocess_region(&$vars) {
  $vars['region_name'] = str_replace('_', '-', $vars['region']);
  $vars['classes_array'][] = $vars['region_name'];

  if ($vars['region'] == 'sidebar_first') {
    $vars['classes_array'][] = theme_get_setting('grid_class_sidebar_first');
  }
  else if ($vars['region'] == 'sidebar_second') {
    $vars['classes_array'][] = theme_get_setting('grid_class_sidebar_second');
  }

  // Sidebar regions receive common 'sidebar' class
  $sidebar_regions = array('sidebar_first', 'sidebar_second');
  if (in_array($vars['region'], $sidebar_regions)) {
    $vars['classes_array'][] = 'sidebar';
  }

  // Content top and bottom regions receive 'wdn-band' class
  $content_regions = array('content_top', 'content_bottom');
  if (in_array($vars['region'], $content_regions)) {
    $vars['classes_array'][] = 'wdn-band';
  }
}

/**
 * Implements template_preprocess_node().
 */
function unl_five_preprocess_node(&$vars) {
  // Add template suggestions that include the view mode.
  $vars['theme_hook_suggestions'][] = 'node__' . $vars['view_mode'];
  $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '__' . $vars['view_mode'];
  $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->nid . '__' . $vars['view_mode'];

  // Add forms css file if content type is webform.
  if ($vars['type'] == 'webform') {
    $path = drupal_get_path('theme', 'unl_five');
    drupal_add_css($path . '/css/form.css');
  }
  // Drupal doesn't correctly set the $page flag for the preview on node/add/page which results in the <h2> being displayed in modules/node/node.tpl.php
  if (isset($vars['elements']['#node']->op) && $vars['elements']['#node']->op == 'Preview') {
    $vars['page'] = true;
  }
  // Change the format of the byline
  if ($vars['uid']) {
    $vars['submitted'] =  t('By !username <span class="datetime">!datetime</span>', array('!username' => $vars['name'], '!datetime' => $vars['date']));
  }
  else {
    $vars['submitted'] =  t('!datetime ', array('!datetime' => $vars['date']));
  }
}

/**
 * Implements template_preprocess_username().
 */
function unl_five_preprocess_username(&$vars) {
  // Link the displayed name to UNL Directory rather than Drupal user page
  $vars['link_path'] = 'http://directory.unl.edu/?uid=' . user_load($vars['account']->uid)->name;
  $vars['link_attributes'] = array('title' => t('View user in the UNL Directory.'));
}

/**
 * Implements hook_username_alter().
 */
function unl_five_username_alter(&$name, $account) {
  if ($account->uid) {
    // If the CAS module is enabled, we should have their full name.
    $user = user_load_by_name($name);
    if ($user && isset($user->data['unl']['fullName'])) {
      $name = $user->data['unl']['fullName'];
      return;
    }
  }
}

/**
 * Implements template_preprocess_page().
 */
function unl_five_preprocess_page(&$vars, $hook) {
  // Wrap 403 pages in WDN wrappers.
  $header = drupal_get_http_header("status");
  if ($header == "403 Forbidden") {
    $vars['page']['content']['system_main']['main']['#markup'] = '<div class="wdn-band"><div class="wdn-inner-wrapper">' . $vars['page']['content']['system_main']['main']['#markup'] . '</div></div>';
  }

  // Add the variable based on the Publishing Option flag set in the unl module.
  $vars['unl_hide_page_title'] = FALSE;
  $nid_exclude_list = variable_get('unl_hide_page_title', array());
  if (isset($vars['node']) && in_array($vars['node']->nid, $nid_exclude_list)) {
    $vars['unl_hide_page_title'] = TRUE;
  }

  // Add the variable based on the Publishing Option flag set in the unl module.
  $vars['unl_remove_inner_wrapper'] = FALSE;
  $nid_exclude_list = variable_get('unl_remove_inner_wrapper', array());
  if (isset($vars['node']) && in_array($vars['node']->nid, $nid_exclude_list)) {
    $vars['unl_remove_inner_wrapper'] = TRUE;
  }

  // Add js to modify the My.UNL login links.
  $loginUrl = url('user', array('query' => drupal_get_destination()));
  $script = "WDN.setPluginParam('idm', 'login', '" . $loginUrl . "'); WDN.setPluginParam('idm', 'logout', 'user/logout');" . PHP_EOL;
  drupal_add_js($script, array('type' => 'inline', 'scope' => 'footer'));

  // Unset the sidebars if on a user page (i.e. user profile or imce file browser)
  if (arg(0) == 'user') {
    $vars['page']['sidebar_first'] = array();
    $vars['page']['sidebar_second'] = array();
  }
}

/**
 * Implements template_process_page().
 */
function unl_five_process_page(&$vars) {
  // Hook into color.module.
  if (theme_get_setting('unl_affiliate') && module_exists('color')) {
    _color_page_alter($vars);
  }

  // Add RSO disclaimer.
  if (theme_get_setting('unl_rso')) {
    foreach ($vars['page']['contactinfo'] as $block => $value) {
      if (!empty($vars['page']['contactinfo'][$block]['#markup'])) {
        $vars['page']['contactinfo'][$block]['#markup'] =  $vars['page']['contactinfo'][$block]['#markup'] . '<br />The views presented here are those of the <em>' . variable_get('site_name') . '</em> student organization and do not necessarily reflect the views of the University of Nebraska&ndash;Lincoln.';
      }
    }
  }
}

/**
 * Implements theme_breadcrumb().
 */
function unl_five_breadcrumb($variables) {
  $breadcrumbs = $variables['breadcrumb'];

  if (count($breadcrumbs) == 0) {
    $breadcrumbs[] = '<a href="">' . check_plain(unl_five_get_site_name_abbreviated()) . '</a>';
  }
  else {
    // Change 'Home' to $site_name.
    array_unshift($breadcrumbs,
                  str_replace('Home', check_plain(unl_five_get_site_name_abbreviated()),
                  array_shift($breadcrumbs)));
  }

  // Add the intermediate breadcrumbs if they exist.
  $intermediateBreadcrumbs = theme_get_setting('intermediate_breadcrumbs');
  if (is_array($intermediateBreadcrumbs)) {
    krsort($intermediateBreadcrumbs);
    foreach ($intermediateBreadcrumbs as $intermediateBreadcrumb) {
      if ($intermediateBreadcrumb['text'] && $intermediateBreadcrumb['href']) {
        array_unshift($breadcrumbs, '<a href="' . $intermediateBreadcrumb['href'] . '">' . check_plain($intermediateBreadcrumb['text']) . '</a>');
      }
    }
  }

  // Prepend Nebraska as the first breadcrumb.
  if (variable_get('site_name') != 'Welcome to Nebraska' &&
      variable_get('site_name') != 'University of Nebraska–Lincoln' &&
      variable_get('site_name') != 'Nebraska') {
    array_unshift($breadcrumbs, '<a href="https://www.unl.edu/">Nebraska</a>');
  }

  // Append menu link title of current page. (See http://drupal.org/node/133242)
  if (!drupal_is_front_page()) {
    $breadcrumbs[] = check_plain(menu_get_active_title());
  }

  $html = '<ol>' . PHP_EOL;
  foreach ($breadcrumbs as $breadcrumb) {
    $html .= '<li>' .  $breadcrumb . '</li>';
  }

  return $html . '</ol>';
}

/**
 * Implements theme_file_icon().
 * File icons are provided as css background sprites in UNL WDN template project.
 */
function unl_five_file_icon($variables) {
  return '';
}

/**
 * Implements theme_menu_tree().
 */
function unl_five_menu_tree($variables) {
  $tree = $variables['tree'];
  return '<ul>' . $tree . '</ul>' . PHP_EOL;
}

/**
 * Implements theme_menu_local_tasks().
 */
function unl_five_menu_local_tasks($variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<ul class="wdn_tabs disableSwitching" id="unlcms_tabs">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<ul class="wdn_tabs disableSwitching" id="unlcms_tabs">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}

/**
 * Implements theme_menu_local_task().
 */
function unl_five_menu_local_task($variables) {
  $link = $variables['element']['#link'];
  $link_text = $link['title'];

  if (!empty($variables['element']['#active'])) {
    // If the link does not contain HTML already, check_plain() it now.
    // After we set 'html'=TRUE the link will not be sanitized by l().
    if (empty($link['localized_options']['html'])) {
      $link['title'] = check_plain($link['title']);
    }
    $link['localized_options']['html'] = TRUE;
    $link_text = t('!local-task-title !active', array('!local-task-title' => $link['title'], '!active' => ''));
  }
  return '<li' . (!empty($variables['element']['#active']) ? ' class="selected"' : '') . '>' . l($link_text, $link['href'], $link['localized_options']) . "</li>\n";
}

/**
 * Implements theme_pager().
 */
function unl_five_pager($variables) {
  // This is straight-copied from the default except with css class names changed and wdn css loaded
  // http://api.drupal.org/api/drupal/includes--pager.inc/function/theme_pager/7
  drupal_add_js("WDN.loadCSS(WDN.getTemplateFilePath('css/modules/pagination.css'));", array('type' => 'inline', 'scope' => 'footer'));

  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => array('pager-first'),
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => array('pager-previous'),
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('ellipsis'),
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('selected'),
            'data' => $i,
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('ellipsis'),
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('pager-next'),
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => array('pager-last'),
        'data' => $li_last,
      );
    }
    return '<h2 class="element-invisible">' . t('Pages') . '</h2>' . theme('item_list', array(
      'items' => $items,
      'attributes' => array('class' => array('wdn_pagination', 'dcf-list-bare')),
    ));
  }
}

function unl_five_status_messages($variables) {
  $display = $variables['display'];

  $output = '';
  foreach (drupal_get_messages($display) as $type => $messages) {
    switch ($type) {
      case 'status':
        $extra_class = ' affirm';
        break;
      case 'warning':
        $extra_class = ' alert';
        break;
      case 'error':
        $extra_class = ' negate';
        break;
      default:
        $extra_class = '';
        break;
    }
    $type = ucfirst($type);
    $output .= <<<EOF
<div class="wdn_notice overlay-header$extra_class">
    <div class="close">
        <a href="#" title="Close this notice">Close this notice</a>
    </div>
    <div class="message">
        <h4>$type</h4>
EOF;
    if (count($messages) > 1) {
      $output .= '<ul>' . PHP_EOL;
      foreach ($messages as $message) {
        $output .= '<li>' . $message . '</li>' . PHP_EOL;
      }
      $output .= '</ul>' . PHP_EOL;
    }
    else {
      $output .= $messages[0];
    }
    $output .= <<<EOF
    </div>
</div>
EOF;
  }

  if (!$output) {
    return '';
  }

  $script = "require(['wdn'], function(WDN) {WDN.initializePlugin('notice');});" . PHP_EOL;
  drupal_add_js($script, array('type' => 'inline', 'scope' => 'footer'));

  return $output;
}

/**
 * Return the abbreviated site name, assuming it has been set. Otherwise return the full site name.
 */
function unl_five_get_site_name_abbreviated() {
  if (theme_get_setting('site_name_abbreviation')) {
    return theme_get_setting('site_name_abbreviation');
  }
  else {
    return variable_get('site_name', 'Department');
  }
}
