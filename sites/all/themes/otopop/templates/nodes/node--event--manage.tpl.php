<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> clearfix node-event-manage"<?php print $attributes; ?>>
  
  <?php print $user_picture; ?>
  
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="d-flex">
    <!--    <div class="col-md-1">-->
    <div class="field_date">
      <span class="date"><?php if (!empty($node->field_event_date)): print date('d M', $node->field_event_date['und'][0]['value']); endif; ?></span>
    </div>
    <!--    </div>-->
    <div class=" field_content">
      <div class="field-title"><?php print $title; ?></div>
      <?php if (!empty($content['field_address'])): ?>
        <div class="field_map"><i
              class="fas fa-map-marker-alt"></i> <?php print render($content['field_address']) ?>
        </div>
      <?php endif; ?>
      <div class="list-circle">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="field-description">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit
      </div>
      <div class="user-join">
        Lee and 38 friends are going
      </div>
      <div class="gr-action">
        <?php
        /*
         * Check User Going
         * */
        $user_joined = 0;
        //        dsm($node->field_participants);
        if (!empty($node->field_participants)):;
          foreach ($node->field_participants['und'] as $item) {
            if ($item['target_id'] == $account->uid):
              $user_joined = 1;
              break;
            endif;
          }
        endif;
        /** End User Going*/
        ?>

        <div class="btn-going <?php if ($user_joined == 1): ?>joined<?php endif; ?>"
             data-nid="<?php print $node->nid ?>"
             data-title="<?php print $title ?>"
             data-uid="<?php print render($account->uid) ?>"
          
          <?php if ($user_joined == 0 ): ?>
            data-toggle="modal"
            data-target="#modalEvent"
            data-author="<?php print  $node->name ?>"
            data-location="demo"
            data-description="<?php if (!empty($content['body'])): print render($content['body']['#items'][0]['value']); else: print ''; endif; ?>"
            data-price="<?php if (!empty($content['field_medal_price'])): $content['field_medal_price']['#items'][0]['value']; else: print ''; endif; ?>"
            data-quantily="<?php if (!empty($content['field_number_of_participants'])): $content['field_number_of_participants']['#items'][0]['value']; else: print ''; endif; ?>"
          <?php elseif($user_joined == 1): ?>
          onclick="custom_not_attend_event(this); return false;"
          <?php endif; ?> >
          <?php if ($user_joined == 0): ?> Going <?php else: ?><i class="fa fa-check"></i> Going <?php endif; ?>
        </div>

        <div class="btn-ignore" data-nid="<?php print $node->nid ?>"
             data-name_events="<?php print $title ?>"
             data-uid="<?php print render($account->uid) ?>"
             onclick="custom_user_going_ignore(this); return false;">Ignore
        </div>
      </div>
    </div>
    <div class="event-right">
      <div class="btn-share"><i class="fas fa-share-alt"></i> Share</div>
    </div>
  </div>

</div>

