<?php if ($content): ?>
  <div class="block-body " style="background-image: url('<?php if ($image): print render($images_path); endif;?>')">
    <div class="container">
      <?php print $content ?>
    </div>
  </div>
<?php endif; ?>
