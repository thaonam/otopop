<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <div<?php if ($classes_array[$id]): ?> class="<?php print $classes_array[$id]; ?>"<?php endif; ?>>
    <div class="profile user-profile-manage user-profile-know">
      <?php if (!empty($view->result[$id]->field_field_photo)): ?>
        <div class="user-img">
          <img src="<?php if(!empty($view->result[$id]->field_field_photo)):print  image_style_url('style_70x70', $view->result[$id]->field_field_photo[0]['raw']['uri']); else: print  '/sites/default/files/styles/style_70x70/public/default_images/no_photo_0.png'; endif; ?>"
              alt="" class="img-responsive">
        </div>
      <?php endif; ?>
      <div class="user-info">
        <?php if (!empty($view->result[$id]->field_field_full_name)): ?>
          <div class="user-full-name">
            <?php print render($view->result[$id]->field_field_full_name[0]['raw']['value']) ?>
          </div>
        <?php else:?>
          <div class="user-full-name">
            <?php print render($view->result[$id]->users_name); ?>
          </div>
        <?php endif; ?>
        <div class="quantity-friends">
          64 mitual friends
        </div>
        <div class="joined">
          <div class="btn-follow" data-uid="<?php print $view->result[$id]->uid; ?>"
               data-user="<?php print $user->name; ?>"
               data-name="<?php print render($view->result[$id]->field_field_full_name[0]['raw']['value']); ?>"
               onclick="custom_add_friend_user(this); return false;">
            Add Friend
          </div>

        </div>
      </div>


    </div>
  </div>
<?php endforeach; ?>