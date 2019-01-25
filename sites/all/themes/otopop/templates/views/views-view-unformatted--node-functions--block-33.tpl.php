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
  <?php if ($id == 0 || $id == 1 || $id == 2):  ?>
    <div<?php if ($classes_array[$id]): ?> class="<?php if (node_load($view->result[$id]->nid)->uid == $user->uid): ?>my-leaderboard <?php endif; ?><?php print $classes_array[$id]; ?>"<?php endif; ?>>
      <div class="number-medal number-<?php print $id ?>"><?php print $id ?></div>
      <?php print $row; ?>
    </div>
  
  <?php endif; ?>
  
  <?php if (node_load($view->result[$id]->nid)->uid == $user->uid): ?>
    <?php if ($id == 0 || $id == 1 || $id == 2): ?>
    
    <?php else: ?>
      <div<?php if ($classes_array[$id]): ?> class="my-leaderboard <?php print $classes_array[$id]; ?>"<?php endif; ?>>
        <div class="number-medal my-number"><?php print $id ?></div>
        <?php print $row; ?>
      </div>
    <?php endif; ?>
  <?php endif; ?>

<?php endforeach; ?>