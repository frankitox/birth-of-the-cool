<div class="section-wrapper">
  <div class="section">
    <?php if ($page['highlighted']): ?>
      <div id="highlighted">
        <?php print render($page['highlighted']); ?>
      </div>
    <?php endif; ?>
    
    <?php if ($title): ?>
    <h1 class="title" id="page-title">
      <?php print $title; ?>
    </h1>
    <?php endif; ?>
    
    <a id="main-content"></a>
    <?php print render($title_prefix); ?>
    <?php print render($title_suffix); ?>
    <?php if ($tabs): ?>
      <div class="tabs">
        <?php print render($tabs); ?>
      </div>
    <?php endif; ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?>
      <ul class="action-links">
        <?php print render($action_links); ?>
      </ul>
    <?php endif; ?>
    <?php print render($page['content']); ?>
    <?php print $feed_icons; ?>
  </div>
</div>

<?php if ($page['sidebar_second']): ?>
<div id="sidebar-second" class="column sidebar">
  <?php print render($page['sidebar_second']); ?>
</div> <!-- /.section, /#sidebar-second -->
<?php endif; ?>
