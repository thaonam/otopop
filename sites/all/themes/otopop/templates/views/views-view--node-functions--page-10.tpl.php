<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>
  
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

</div><?php /* class view */ ?>

<!-- Start: Modal Upload Image New Part Record-->
<!--<div id="mymodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="">-->
<!--  <div class="modal-dialog" role="document">-->
<!--    <div class="modal-content">-->
<!--      <div class="form-horizontal" id="exercise-wrapper">-->
<!--        <div class="modal-header text-center">-->
<!--          <h3>Thank you for your participation!</h3>-->
<!--          Upload a photo to complete this even-->
<!--        </div>-->
<!--        <div class="modal-body text-center">-->
          <!--          <input type="file" name="" id="Upload">-->
<!--          <input type="file" name="photo" id="profile-photo" accept="image/*" style="display: none;">-->
<!--          <div class="banner-camera" id="past-record-photo-upload-trigger" onclick="custom_upload_image(this);">-->
<!--            <div class="img-upload">-->
<!---->
<!--            </div>-->
<!--            <i id="photo-from-camera" class="fa fa-camera" aria-hidden="true"></i>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="modal-footer">-->
<!--          <button class="btn-complete" data-uid="" data-event_id="" onclick="custom_calories_burn_stop('success', this); return true;">Complete</button>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!--End: Modal Updload Updload Image Created New Node Part Record-->

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

