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
global $user;
//dsm($user->roles);
?>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <div class="view-header">
    <!--    --><?php //if ($header): ?>
    <!--      --><?php //print $header; ?>
    <!--    --><?php //endif; ?>
    <div class="view-header-top">
      <h1 class="page-title">Events</h1>
      <?php if (!empty($user->roles[3])):if ($user->roles[3] == 'webmaster'): ?>
        <a href="/node/add/event?destination=user/manage/events" class="btn-add ml-auto"><i class="fas fa-plus"></i> Event</a>
      <?php endif;endif; ?>
      <div class="btn-display">
        <div class="btn-list"><i class="fas fa-list"></i></div>
        <div class="btn-calendar"><a href="/user/manage/events/calendar"><i class="far fa-calendar-alt"></i></a></div>
      </div>
    </div>
  </div>

  <div id="manage-group">
    
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
      <hr>
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

</div>
<?php /* class view */ ?>

<div class="modal fade modal-event" id="modalEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header-event">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"> Title </h4>
        <div class="modal-author">Organised by <span></span></div>
        <div class="modal-event-location"><i class="fas fa-map-marker"></i> <span></span></div>
      </div>
      <div class="modal-body  modal-body-event">

        <div class="modal-event-desc">Nội dung ở đây</div>
        <div class="modal-group-select-radio">
          <div class="group-title">Select your option</div>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#medal"><i class="fa fa-circle" aria-hidden="true"></i> Medal  <span class="modal-price" style="padding-left: 5px"></span></a></li>
            <li><a data-toggle="tab" href="#free"><i class="fa fa-circle" aria-hidden="true"></i> No Medal - $0 (Free)</a></li>
          </ul>


        </div>
      </div>
      <div class="modal-footer">
        <div class="tab-content">
          <div id="medal" class="tab-pane fade in active">
            <a href="#" class="modal-button " data-price="">Process Payment</a>
          </div>
          <div id="free" class="tab-pane fade">
            <div class="modal-button btn-join " onclick="custom_user_going_events(this); return false;">Join Now</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>