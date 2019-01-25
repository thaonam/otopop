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
<!--file: /otopop/templates/views/views-view--node-functions--block-27.tpl.php-->
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div class="view-header">
    <div class="back">
      <a href="/user/manage/activity"><i class="fas fa-chevron-left"></i></a>
      <span class="page-title"><?php print render($taxonomy_title) ?></span>
    </div>
    <button class="btn btn-round btn-add" data-toggle="modal" data-target="#act2-modal">Open Activity</button>
  </div>

  <div id="manage-activity">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#global-activity" data-toggle="tab">Discover Global Activity</a></li>
      <li><a href="#friends-activity" data-toggle="tab">Friend's Activity</a></li>
      <li><a href="#joined-activity" data-toggle="tab">Joined Activity</a></li>
    </ul>


    <div class="tab-content">
      <div class="tab-pane active" id="global-activity">
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
          <div class="view-content 123">
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
        <?php if ($feed_icon): ?>
          <div class="feed-icon">
            <?php print $feed_icon; ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="tab-pane" id="friends-activity">
        <?php if ($footer): ?>
          <?php print $footer; ?>
        <?php endif; ?>

      </div>

      <div class="tab-pane" id="joined-activity">
        <?php if ($header): ?>
          <?php print $header; ?>
        <?php endif; ?>
      </div>
    </div>

  </div>
</div>
<?php /* class view */ ?>

<!-- Modal -->
<div class="modal modal-activity fade" id="act2-modal" tabindex="-1" role="dialog" aria-labelledby="">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="form-horizontal" id="custom-form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="">Create an Open Activity</h4>
        </div>
        <div class="modal-body">
          <div class="row">
	      		<span class="col-md-6">
				      <input type="text" class="form-control " id="activity_date" name="activity_date" placeholder="Date"/>
	      		</span>
            <span class="col-md-6">
				      <input type="text" class="form-control" name="activity_time" placeholder="Time in HH:MM"/>
	      		</span>
          </div>

          <div class="row">
            <div class="col-md-12 m-t-smm">
              <input type="text" class="form-control" id="activity_location" name="activity_location" placeholder="Location"/>
              <input type="hidden" name="activity_location_lat" value="" id="activity_location_lat"/>
              <input type="hidden" name="activity_location_lng" value="" id="activity_location_lng"/>
            </div>
            <div class="col-md-12 m-t-smm">
              <input type="text" class="form-control" name="activity_participants" placeholder="Number of Participants"/>
            </div>
            <div class="col-md-12 m-t-md">
              <p>Tag Groups</p>
              <input type="text" class="form-control" name="activity_groups" placeholder="Group names"/>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="activity_sport" value="<?php echo arg(3); ?>" id="activity_sport"/>
          <button class="btn btn-round m-t-md m-r-sm" data-uid="<?php print render($account_uid) ?>" onclick="custom_activity_create(this); return false;">
            Create
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

