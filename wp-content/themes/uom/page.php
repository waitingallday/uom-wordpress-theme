<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */

get_header(); ?>

<div class="page-local-history">
  <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
	<span>/</span>
  <a href="."><?php the_title(); ?></a>
</div>

<div role="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<h1><?php the_title(); ?></h1>

		<div class="entry">
			<?php the_content(); ?>
		</div>
	</div>

	<?php endwhile; endif; ?>
	<?php edit_post_link('Edit'); ?>

	<?php comments_template(); ?>
</div>

<?php get_footer(); ?>
