<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    
    <style type="text/css">
      #content {
        padding: 10px;
        margin-top: 50px;
        background-color: #f0f0f0;
        border: 1px solid #e6e6e6;
        text-align: center;
        font-size: 2em;
        font-family: Arial;
        width: 90%;
        margin-left: auto;
        margin-right: auto;
      }
    </style>
  </head>
  <body class="<?php print $classes; ?>">
  <?php print $page_top; ?>

  <div id="page">
    <div id="content" class="clearfix">
      <?php print $content; ?>
    </div>
  </div>

  <?php print $page_bottom; ?>
  </body>
</html>
