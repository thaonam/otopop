<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any.
 *
 * @ingroup views_templates
 */
?>
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

    <div class="page-title">Friends</div>
    <div class="gr-right">
      
      <div class="friends-add"><i class="fas fa-user-plus"></i></div>
      <div class="friends-request"><a href="/user/manage/request-follow">Friends Requests <span><?php print count(views_get_view_result('node_functions', 'block_23'))?></span></a></div>
      <div class="friends-search"><i class="fas fa-search"></i></div>
    </div>
  </div>


  <div id="manage-friends">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#my-friends" data-toggle="tab">My Friends</a></li>
      <li><a href="#people-you-know" data-toggle="tab">People you may know</a></li>
      <li><a href="#followers" data-toggle="tab">Followers</a></li>
      <li><a href="#following" data-toggle="tab">Following</a></li>
    </ul>

    <div class="tab-content ">
      <div class="tab-pane active" id="my-friends">
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
        
        <?php if ($footer): ?>
          <div class="view-footer">
            <?php print $footer; ?>
          </div>
        <?php endif; ?>
        
        <?php if ($feed_icon): ?>
          <div class="feed-icon">
            <?php print $feed_icon; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="tab-pane" id="people-you-know">
        <?php print render($block_user_know); ?>
      </div>
      <div class="tab-pane" id="followers">
        <?php print render($block_user_follower) ?>
      </div>
      <div class="tab-pane" id="following">
        <?php print render($block_user_following); ?>
      </div>
    </div>
  </div>


  </div><?php /* class view */ ?>