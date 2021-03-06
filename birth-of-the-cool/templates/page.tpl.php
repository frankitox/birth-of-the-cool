<?php

/**
 * @file Bartik's theme implementation to
 * display a single Drupal page.
 *
 * The doctype, html, head and body tags are
 * not in this template. Instead they can be
 * found in the html.tpl.php template normally
 * located in the modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['pre_footer']: Items for the footer region.
 * - $page['f_firstcolumn']: Items for the first footer column.
 * - $page['f_secondcolumn']: Items for the second footer column.
 * - $page['f_thirdcolumn']: Items for the third footer column.
 * - $page['f_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
?>
<div id="page-wrapper"><div id="page">

  <?php require 'header.tpl.php'; ?>

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">
    
    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>
    
    <div class="content-container
             <?= ($page['sidebar_first']) ?
                  "sidebar-first-on" : " "; ?>
             <?= ($page['sidebar_second']) ?
                  "sidebar-second-on" : " "; ?>
                  ">
      
      <?php if ($page['featured']): ?>
        <div id="featured"><div class="section clearfix">
          <?php print render($page['featured']); ?>
        </div></div> <!-- /.section, /#featured -->
      <?php endif; ?>
      
      <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="column sidebar"><div class="section">
          <?php print render($page['sidebar_first']); ?>
        </div></div> <!-- /.section, /#sidebar-first -->
      <?php endif; ?>
    
      <div id="content" class="column">
        <?php require 'content.tpl.php'; ?>
      </div>
    </div><!-- .content-container -->

  </div></div> <!-- /#main, /#main-wrapper -->

  <?php if ($page['rounded_menu']): ?>
  <div id="rounded-menu" class="clearfix">
    <div>
      <ul class="clearfix">
        <?= theme('links__menu_rounded_menu',
                  array ('links' => $rounded_menu)); ?>
      </ul>
    </div>
  </div>
  <?php endif; ?>
  
  <?php if ($is_front): ?>
    <?php require 'events.tpl.php'; ?>
  <?php endif; ?>
  
  <?php if ($page['pre_footer']): ?>
  <div id="pre-footer" class="clearfix">
    <?php print render($page['pre_footer']); ?>
  </div>
  <?php endif; ?>

  <?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
    <div id="triptych-wrapper"><div id="triptych" class="clearfix">
      <?php print render($page['triptych_first']); ?>
      <?php print render($page['triptych_middle']); ?>
      <?php print render($page['triptych_last']); ?>
    </div></div> <!-- /#triptych, /#triptych-wrapper -->
  <?php endif; ?>

  <div id="before-footer" class="clearfix">
    <?php require 'before-footer.tpl.php'; ?>
  </div>
  
  <div id="footer-wrapper"><div class="section">

    <?php if ($page['f_firstcolumn'] || $page['f_secondcolumn'] || $page['f_thirdcolumn'] || $page['f_fourthcolumn']): ?>
      <div id="footer-columns" class="clearfix">
        <?php print render($page['f_firstcolumn']); ?>
        <?php print render($page['f_secondcolumn']); ?>
        <?php print render($page['f_thirdcolumn']); ?>
        <?php print render($page['f_fourthcolumn']); ?>
      </div> <!-- /#footer-columns -->
    <?php endif; ?>

    <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">
        <?php print render($page['footer']); ?>
        <div class="hedra">
          <?= t('Designed by') ?>
          <a href="http://estudiohedra.com" target="_blank">
            <img src="<?= image_url ('hedra.png'); ?>">
          </a>
        </div>
        <div id="sitemap">
          <a class="more-link"
             href="<?php print url("sitemap") ?>">
            Sitemap
          </a>
        </div>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
