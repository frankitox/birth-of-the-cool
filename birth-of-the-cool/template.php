<?php

/**
  * Add hook for menu block
  */
function birthofthecool_theme
    (&$existing, $type, $theme, $path) {
  
  $hooks['user_login_block'] = array(
    'template' => 'templates/user-login-block',
    'render element' => 'form',
  );
  return $hooks;
}

/**
  * Add variables to the user login block.
  */
function birthofthecool_preprocess_user_login_block
    (&$vars) {
  
  $vars['name']     =
    render($vars['form']['name']);
  $vars['pass']     =
    render($vars['form']['pass']);
  $vars['submit']   =
    render($vars['form']['actions']['submit']);
  $vars['rendered'] =
    drupal_render_children($vars['form']); }

/**
 * Add body classes if certain regions have
 * content.
 */
function birthofthecool_preprocess_html(&$variables) {
  if (!empty($variables['page']['featured'])) {
    $variables['classes_array'][] = 'featured';
  }

  if (!empty($variables['page']['triptych_first'])
    || !empty($variables['page']['triptych_middle'])
    || !empty($variables['page']['triptych_last'])) {
    $variables['classes_array'][] = 'triptych';
  }

  if (!empty($variables['page']['footer_firstcolumn'])
    || !empty($variables['page']['footer_secondcolumn'])
    || !empty($variables['page']['footer_thirdcolumn'])
    || !empty($variables['page']['footer_fourthcolumn'])) {
    $variables['classes_array'][] = 'footer-columns';
  }

  // Add conditional stylesheets for IE
  drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/fontastic.css');
  drupal_add_css("https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700",
                 array('type' => 'external'));
}

/**
 * Override or insert variables into the page
 * template for HTML output.
 */
function birthofthecool_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Override or insert variables into the page template.
 */
function birthofthecool_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function birthofthecool_preprocess_maintenance_page(&$variables) {
  // By default, site_name is set to Drupal if no db connection is available
  // or during site installation. Setting site_name to an empty string makes
  // the site and update pages look cleaner.
  // @see template_preprocess_maintenance_page
  if (!$variables['db_is_active']) {
    $variables['site_name'] = '';
  }
  drupal_add_css(drupal_get_path('theme', 'birthofcool') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function birthofthecool_process_maintenance_page(&$variables) {
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}

/**
 * Override or insert variables into the node template.
 */
function birthofthecool_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}

/**
 * Override or insert variables into the block template.
 */
function birthofthecool_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}

/**
 * Implements theme_menu_tree().
 */
function birthofthecool_menu_tree($variables) {
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_field__field_type().
 */
function birthofthecool_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '"' . $variables['attributes'] .'>' . $output . '</div>';

  return $output;
}

function birthofthecool_preprocess_page(&$variables){
  $variables['login_menu'] =
    menu_navigation_links('menu-login-menu');
  $variables['rounded_menu'] =
    menu_navigation_links('menu-rounded-menu');
}

function birthofthecool_links__menu_login_menu ($variables) {
  $html = "<div>\n";
  $html .= "  <ul>\n";
  foreach ($variables['links'] as $link) {
    if ($link === reset($variables['links']))
      $html .= "<li class='first'>";
    else if ($link === end($variables['links']))
      $html .= "<li class='last'>";
    else
      $html .= "<li>";
    
    $html .= l($link['title'], $link['href'], $link)
          . "</li>"; }
  
  $html .= "  </ul>\n";
  $html .= "</div>\n";
  
  return $html; }

function birthofthecool_links__locale_block(&$vars) {
  global $language;
  
  $html =  "<ul>\n";
  # First the current language.
  foreach ($vars['links'] as $lang => $info) {
    if ($lang === $language->language) {
    $html .= "<li class='active'>\n";
      $html .= l($info['title']."<i class='icon-triangle-down'></i>", $info['href'], array ('html' => true));
    $html .= "</li>\n"; } }
  # Then the other languages.
  foreach ($vars['links'] as $lang => $info) {
    if ($lang !== $language->language) {
    $html .= "<li>\n";
      $html .= l($info['title'], $info['href'], $info);
    $html .= "</li>\n"; } }
  $html .= "</ul>\n";
  
  return $html; }

// TODO: Check if there's another way of doing
// this. Must be a render function in Drupal.
function birthofthecool_links__menu_rounded_menu ($variables) {
  $icons = array ("laptop", "edit-paper",
                  "people", "envelope-inverse");
  $i     = 0; # icons index.
  
  $menu  = "<ul class='clearfix'>\n";
  foreach ($variables['links'] as $link) {
    // html = true, so $outer isn't escaped.
    $link['html'] = true; 
    
    $menu .= "<li>\n";
    $menu .= "<div>\n";
    
    $outer  = "<div class='outer-border'>\n";
    $outer .= "  <div class='inner-border'>\n";
    $outer .= "    <div>\n";
    $outer .= "      <div class='content'>\n";
    $outer .= "        <div>\n";
    $outer .= "          <i class='icon-".$icons[$i]."'></i>\n";
    $outer .= "          <h1>".$link['title']."</h1>";
    $outer .= "          <p>".$link['attributes']['title']."</p>";
    $outer .= "          <span>ver más</span>";
    $outer .= "        </div>\n";
    $outer .= "      </div>\n";
    $outer .= "    </div>\n";
    $outer .= "  </div>\n";
    $outer .= "</div>\n";
    
    $menu .= l($outer, $link['href'], $link);
    $menu .= "</div>\n";
    $menu .= "</li>\n";
    
    $i++; # Increase icons index.
  }
  
  $menu .= "</ul>\n";
  
  return $menu; }
