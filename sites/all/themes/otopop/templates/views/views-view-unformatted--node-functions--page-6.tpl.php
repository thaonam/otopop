<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */

global $user;
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <div<?php if ($classes_array[$id]): ?> class="<?php print $classes_array[$id]; ?>"<?php endif; ?>>
<!--    --><?php //dsm($view->result[$id]) ?>
    <?php if ($view->result[$id]->users_node_uid == $user->uid && $view->result[$id]->users_field_data_field_member_uid != $user->uid): ?>
      <div class="profile user-profile-manage">
        <?php if (!empty($view->result[$id]->field_field_photo)): ?>
          <div class="user-img">
            <img src="<?php print  image_style_url('style_100x100', $view->result[$id]->field_field_photo[0]['raw']['uri']) ?>" alt="" class="img-responsive">
          </div>
        <?php endif; ?>
        <div class="user-info">
          <?php if (!empty($view->result[$id]->field_field_full_name)): ?>
            <div class="user-full-name">
              <?php print render($view->result[$id]->field_field_full_name[0]['raw']['value']) ?>
            </div>
          <?php endif; ?>
          <div class="quantity-friends">
            64 friends
          </div>
          <div class="user-rating">
            <span>Rating: </span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
          </div>
        </div>
        <div class="joined">
          <div class="btn-friends">
            <svg aria-hidden="true" data-prefix="fal" data-icon="exchange" role="img" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 512 512" class="svg-inline--fa fa-exchange">
              <path fill="currentColor"
                    d="M508.485 184.485l-92.485 92c-4.687 4.686-12.284 4.686-16.97 0l-7.071-7.07c-4.687-4.686-4.687-12.284 0-16.971L452.893 192H12c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h440.905l-60.946-60.444c-4.687-4.686-4.687-12.284 0-16.971l7.07-7.07c4.687-4.686 12.284-4.686 16.971 0l92.485 92c4.687 4.686 4.686 12.284 0 16.97zm-504.97 160l92.485 92c4.687 4.686 12.284 4.686 16.971 0l7.07-7.07c4.687-4.686 4.687-12.284 0-16.971L59.095 352H500c6.627 0 12-5.373 12-12v-8c0-6.627-5.373-12-12-12H59.107l60.934-60.444c4.687-4.686 4.687-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.687-16.97 0l-92.485 92c-4.686 4.686-4.687 12.284 0 16.97z"
                    class=""></path>
            </svg>
            <!--      <i class="fas fa-exchange"></i> -->
            Friends
          </div>
        </div>
      </div>
    <?php elseif ($view->result[$id]->users_node_uid != $user->uid && $view->result[$id]->users_field_data_field_member_uid == $user->uid): ?>
      <div class="profile user-profile-manage">
        <?php if (!empty($view->result[$id]->field_field_photo_1)): ?>
          <div class="user-img">
            <img src="<?php print  image_style_url('style_100x100', $view->result[$id]->field_field_photo_1[0]['raw']['uri']) ?>" alt="" class="img-responsive">
          </div>
        <?php endif; ?>
        <div class="user-info">
          <?php if (!empty($view->result[$id]->field_field_full_name_1)): ?>
            <div class="user-full-name">
              <?php print render($view->result[$id]->field_field_full_name_1[0]['raw']['value']) ?>
            </div>
          <?php endif; ?>
          <div class="quantity-friends">
            64 friends
          </div>
          <div class="user-rating">
            <span>Rating: </span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
          </div>
        </div>

        <div class="joined">
          <div class="btn-friends">
            <svg aria-hidden="true" data-prefix="fal" data-icon="exchange" role="img" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 512 512" class="svg-inline--fa fa-exchange">
              <path fill="currentColor"
                    d="M508.485 184.485l-92.485 92c-4.687 4.686-12.284 4.686-16.97 0l-7.071-7.07c-4.687-4.686-4.687-12.284 0-16.971L452.893 192H12c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h440.905l-60.946-60.444c-4.687-4.686-4.687-12.284 0-16.971l7.07-7.07c4.687-4.686 12.284-4.686 16.971 0l92.485 92c4.687 4.686 4.686 12.284 0 16.97zm-504.97 160l92.485 92c4.687 4.686 12.284 4.686 16.971 0l7.07-7.07c4.687-4.686 4.687-12.284 0-16.971L59.095 352H500c6.627 0 12-5.373 12-12v-8c0-6.627-5.373-12-12-12H59.107l60.934-60.444c4.687-4.686 4.687-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.687-16.97 0l-92.485 92c-4.686 4.686-4.687 12.284 0 16.97z"
                    class=""></path>
            </svg>
            Friends
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
<?php endforeach; ?>