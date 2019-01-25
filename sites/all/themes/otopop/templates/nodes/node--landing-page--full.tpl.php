<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see     template_preprocess()
 * @see     template_preprocess_node()
 * @see     template_process()
 *
 * @ingroup themeable
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix "<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <div class="content"<?php print $content_attributes; ?>>
    
    <?php if ($node->nid == "32"): //Page Socialise        ?>
      <?php print render($content); ?>
      <!--Block: Discover Groups-->
      <?php if (!empty($group_new_block_8)): ?>
        <section id="block-views-node-functions-block-8" class="block block-views col-md-6 block-global-header-bg  mt-30  clearfix">
          <h2 class="block-title socialise">Discover Groups</h2>
          <?php print $group_new_block_8; ?>
        </section>
      <?php endif; ?>
      <!--Enn BLock: Discover Groups-->

      <!--Block: My Statistic-->
      <!--      --><?php //if (!empty($my_statistic_block_9)): ?>
      <!--        <section id="block-views-node-functions-block-9" class="block block-views col-md-6 block-global-header-bg mt-30 clearfix">-->
      <!--          <h2 class="block-title">My Statistic</h2>-->
      <!--          --><?php //print $my_statistic_block_9; ?>
      <!--        </section>-->
      <!--      --><?php //endif; ?>
      <!--End Block: My Statistic-->
      <!--Block: Forum-->
      <?php if (!empty($forum_block_45)): ?>
        <section id="block-views-node-functions-block-45" class="block block-views col-md-6 block-global-header-bg mt-30 clearfix">
          <h2 class="block-title">Forum</h2>
          <?php print $forum_block_45; ?>
        </section>
      <?php endif; ?>
      <!--End Block: My Forum-->

      <!--Block: New Sfeed-->
      <?php if (!empty($post_by_list_friend)): ?>
        <section id="block-views-node-functions-block-2" class="block block-views socialise col-md-12 block-global-header-bg contextual-links-region clearfix">
          <h2 class="block-title">New Sfeed</h2>
          <?php print $post_by_list_friend; ?>
        </section>
      <?php endif; ?>
      <!--End Block: New Sfeed-->

      <!--Block: Follow Friends-->
      <?php if (!empty($friend_not_follow)): ?>
        <section id="block-views-user-functions-block-1" class="block block-views col-md-12 mt-30  block-global-header-bg clearfix">
          <h2 class="block-title socialise">Connect Width Friends</h2>
          <?php print $friend_not_follow; ?>
        </section>
      <?php endif; ?>
      <!--End Block: Follow Friends-->
    
    <?php elseif ($node->nid == '34'): //Page Excercise?>

      <!--Block: Discover Activity-->
      <?php if (!empty($activity_list_exercise)): ?>
        <section id="block-views-node-functions-block-30" class="block block-views col-md-12 block-global-header-bg block-activity-exercise clearfix">
          <h2 class="block-title">DISCOVER ACTIVITY</h2>
          <?php print $activity_list_exercise; ?>
        </section>
      <?php endif; ?>
      <!--End Block:  Discover Activity -->
      
      <?php print render($content); ?>
    <?php else: ?>
      <?php print render($content); ?>
    <?php endif; ?>

  </div>
</div>
