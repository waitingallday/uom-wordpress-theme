<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */

/*
Template Name: Homepage
*/
get_header(); ?>

<div class="floating"></div>
<div role="main">
  <header class="banner" style="background-image:url(<?php header_image(); ?>)">
    <div class="mid-align">
      <h1><?php bloginfo('name'); ?></h1>
      <p><?php bloginfo('description'); ?></p>
    </div>
  </header>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <div class="entry">
      <?php if (count_active_categories() > 0) { ?>
      <h1><?php the_title(); ?></h1>
      <?php } ?>
      <?php the_content(); ?>
    </div>
  </div>

  <?php endwhile; endif; ?>
  <?php edit_post_link('Edit'); ?>
</div>

<?php get_footer(); ?>
