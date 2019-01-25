<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <div class="view-header">
    <?php if ($header): ?>
      
      <?php print $header; ?>
    <?php endif; ?>

    <div class="page-title">Achievement</div>

  </div>


  <div id="manage-achievement">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#achievement-all" data-toggle="tab">All</a></li>
      <li><a href="#achievement-complete" data-toggle="tab">Complete</a></li>
      <li><a href="#achievement-incomplete" data-toggle="tab">Incomplete</a></li>
    </ul>

    <div class="tab-content ">
      <div class="tab-pane active" id="achievement-all">
        <?php if ($exposed): ?>
          <div class="view-filters">
            <?php print $exposed; ?>
          </div>
        <?php endif; ?>
        
        <?php if ($attachment_before): ?>
          <div class="attachment attachment-before">
            <?php print $attachment_before; ?>
          </div>
        <?php endif; ?>
        <?php if ($rows): ?>
          <div class="view-content">
            <?php print $rows; ?>
          </div>
        <?php elseif ($empty): ?>
          <div class="view-empty">
            <?php print $empty; ?>
          </div>
        <?php endif; ?>
        <?php if ($pager): ?>
          <?php print $pager; ?>
        <?php endif; ?>
        <?php if ($attachment_after): ?>
          <div class="attachment attachment-after">
            <?php print $attachment_after; ?>
          </div>
        <?php endif; ?>
        
        <?php if ($more): ?>
          <?php print $more; ?>
        <?php endif; ?>


      </div>
      <div class="tab-pane" id="achievement-complete">
<!--        --><?php //if ($rows): ?>
<!--          <div class="view-content">-->
<!--            --><?php //print $rows; ?>
<!--          </div>-->
<!--        --><?php //elseif ($empty): ?>
<!--          <div class="view-empty">-->
<!--            --><?php //print $empty; ?>
<!--          </div>-->
<!--        --><?php //endif; ?>
<!--        --><?php //if ($pager): ?>
<!--          --><?php //print $pager; ?>
<!--        --><?php //endif; ?>
<p>        No achievement at the moment</p>
      </div>
      <div class="tab-pane" id="achievement-incomplete">
        
<!--        --><?php //if ($rows): ?>
<!--          <div class="view-content">-->
<!--            --><?php //print $rows; ?>
<!--          </div>-->
<!--        --><?php //elseif ($empty): ?>
<!--          <div class="view-empty">-->
<!--            --><?php //print $empty; ?>
<!--          </div>-->
<!--        --><?php //endif; ?>
<!--        --><?php //if ($pager): ?>
<!--          --><?php //print $pager; ?>
<!--        --><?php //endif; ?>
        <p>        No achievement at the moment</p>
        
      </div>

    </div>
  </div>


</div><?php /* class view */ ?>