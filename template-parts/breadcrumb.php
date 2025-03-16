<!-- breadcrumb -->
<?php if (function_exists('bcn_display')): //BreadcrumbNavXTプラグインが入っているときだけ表示する 
?>
  <!-- breadcrumb -->
  <div class="breadcrumb">
    <?php bcn_display(); // BreadcrumbNavXTのパンくずリストを表示するための記述 
    ?>
  </div><!-- /breadcrumb -->
<?php endif; ?>