<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
//global
//user
global $user;
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <div<?php if ($classes_array[$id]): ?> class="<?php print $classes_array[$id]; ?>"<?php endif; ?>>
    <div class="profile user-profile-manage user-profile-follower">
      <!--      --><?php //dsm($view->result[$id]) ?>
      <?php if (!empty($view->result[$id]->field_field_photo)): ?>
        <div class="user-img">
          <img
              src="<?php print  image_style_url('style_100x100', $view->result[$id]->field_field_photo[0]['raw']['uri']) ?>"
              alt="" class="img-responsive">
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
        <div class="btn-follow" data-uid="<?php print $view->result[$id]->users_node_uid; ?>"
             data-user="<?php print $user->name; ?>"
             data-name="<?php print render($view->result[$id]->field_field_full_name[0]['raw']['value']); ?>"
             onclick="custom_follow_user(this); return false;"> Follow Back
        </div>
        <div class="btn-delete"> Delete</div>
      </div>
    </div>
  </div>
<?php endforeach; ?>