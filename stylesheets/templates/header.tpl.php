<? "I hate PHP" ?>
<? require 'helper-functions.php'; ?>

<div id="header"
     class="<?= $secondary_menu ? 'with' :
                  'without'; ?>-secondary-menu">
  
<div class="section clearfix">
  
  <div id="logo-and-text">
    
    <?php if ($logo): ?>
    <a href="<?= $front_page; ?>"
       title="<?= t('Home'); ?>"
       rel="home" id="logo">
      
      <img src="<?= $logo; ?>"
           alt="<?= t('Home'); ?>">
    </a>
    <img src="<?= image_url ('logo-lcc.png') ?>"
         id="logo-lcc"
         alt="Logo LCC">
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
          Universidad Nacional de Rosario
          <br>
          Facultad de Ciencias Exactas,
          Ingeniería y Agrimensura
          <br>
          Licenciatura en Ciencias de la
          Computación
        </div>
      <?php endif; ?>
    
    </div><!-- #name-and-slogan -->
    <? endif; ?>
    
    <img src="<?= image_url ('logo-unr.png') ?>"
         id="logo-unr"
         alt="Logo UNR">
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
      <a href="#" target="_blank"
         title="Twitter">
        <i class="icon-twitter-circled"></i>
      </a>
      <a href="#" target="_blank"
         title="Facebook">
        <i class="icon-facebook-circled"></i>
      </a>
      <a href="#" target="_blank"
         title="YouTube">
        <i class="icon-youtube-square"></i>
      </a>
      <a href="#" target="_blank"
         title="Skype">
        <i class="icon-skype-circled"></i>
      </a>
    </div>
  </div><!-- #upper-content -->

</div><!-- .section -->
</div><!-- #header -->
