<? "I hate PHP" ?>
<? require 'helper-functions.php'; ?>

<div id="header"
     class="<?= $secondary_menu ? 'with' :
                  'without'; ?>-secondary-menu">
  
<div class="section clearfix">
  
  <div id="logo-and-text">
    
    <?php if ($logo): ?>
    <!-- DCC logo -->
    <a href="<?= $front_page; ?>"
       title="<?= t('Home'); ?>"
       rel="home" id="logo">
      
      <img src="<?= $logo; ?>"
           alt="<?= t('Home'); ?>">
    </a>
    
    <!-- LCC logo -->
    <a href="<?= $front_page; ?>"
       title="<?= t('Home'); ?>"
       rel="home">
      <img src="<?= image_url ('logo-lcc.png') ?>"
           id="logo-lcc"
           alt="Logo LCC">
    </a>
    <?php endif; ?>
    
    <? if ($site_name || $site_slogan): ?>
    <div id="name-and-slogan"
         class="<?= ($hide_site_name && $hide_site_slogan) ?
                      'element-invisible' : ''; ?>">
  
      <? if ($site_name): ?>
        
        <? if ($title): ?>
        <div id="site-name"
             class="<?= ($hide_site_name) ?
                          'element-invisible' : ''; ?>">
          <strong>
            <a href="<?= $front_page; ?>"
               title="<?= t('Home'); ?>"
               rel="home">
              <span><?= $site_name; ?></span>
            </a>
          </strong>
        </div>
        <? /* Default to <H1> when empty title */ ?>
        <? else: ?>
        <h1 id="site-name"
            class="<?= ($hide_site_name) ?
                         'element-invisible' : ''; ?>">
          
          <a href="<?= $front_page; ?>"
             title="<?= t('Home'); ?>" rel="home">
            
            <span><?= $site_name; ?></span>
          </a>
        </h1>
        <? endif; ?>
      <? endif; ?>
  
      <?php if ($site_slogan): ?>
        <div id="site-slogan"
             class="<?= ($hide_site_slogan) ? 
                          'element-invisible' : ''; ?>">
          <? # $site_slogan; ?>
          Departamento de Ciencias de la
          Computación
          <br>
          Facultad de Ciencias Exactas,
          Ingeniería y Agrimensura
          <br>
          Universidad Nacional de Rosario
        </div>
      <?php endif; ?>
    
    </div><!-- #name-and-slogan -->
    <? endif; ?>
    
    <div class="uni-logos">
      <?php require 'uni-logos.tpl.php'; ?>
    </div>
  </div><!-- #logo-and-text -->

  <? if ($main_menu): ?>
    <div id="main-menu" class="navigation">
      <?= theme('links__system_main_menu', array(
        'links' => $main_menu,
        'attributes' => array(
          'id' => 'main-menu-links',
          'class' => array('links', 'clearfix'),
        ),
        'heading' => array(
          'text' => t('Main menu'),
          'level' => 'h2',
          'class' => array('element-invisible'),
        ),
      )); ?>
    </div><!-- #main-menu -->
  <? endif; ?>

  <? if ($page['header_bottom_right']): ?>
  <?= render($page['header_bottom_right']); ?>
  <? endif; ?>

  <div id="upper-content" class="clearfix">
    <?= render($page['header']); ?>

    <? if ($secondary_menu): ?>
      <div id="secondary-menu" class="navigation">
        <?= theme('links__menu_login_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'id' => 'secondary-menu-links',
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Secondary menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#secondary-menu -->
    <? endif; ?>
  
    <div class="social-media">
      <?php require 'social-media.tpl.php'; ?>
    </div>
  </div><!-- #upper-content -->

</div><!-- .section -->
</div><!-- #header -->
