<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */

get_header(); ?>

<div class="page-local-history">
  <a class="last" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
</div>

<div role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'kubrick') . '</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'kubrick') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link(__('Edit this entry.', 'kubrick'), '<p>', '</p>'); ?>

	<?php comments_template(); ?>

</div>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
