<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */

get_header(); ?>

<div class="floating"></div>
<div role="main">
  <header style="background-image:url(//uom-design-system.s3.amazonaws.com/templates/0.1/components/globals/bg-banner-2edd2279a97e316344e7831983ef6868.jpg);background-size:cover;min-height:300px"></header>

	<?php if (have_posts()) : ?>
	<div class="news-index">

		<?php while (have_posts()) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>">
    <a href="<?php the_permalink() ?>">
      <p class="topic"><?php get_the_category_list(', '); ?></p>
      <h1><?php the_title(); ?></h1>
      <p><?php the_content(__('Read the rest of this entry &raquo;', 'kubrick')); ?></p>
    </a>
    <?php edit_post_link(__('Edit', 'kubrick'), '', ' | '); ?>
  </article>
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'kubrick')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'kubrick')) ?></div>
		</div>

	<?php else : ?>

		<h2><?php _e('Not Found', 'kubrick'); ?></h2>
		<p><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'kubrick'); ?></p>

		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
