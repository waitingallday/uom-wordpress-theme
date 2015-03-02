<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */

$pagetitle = printf('Search Results for: %s', get_search_query());
get_header(); ?>

<div class="page-local-history">
  <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
	<span>/</span>
  <a href="."><?php echo $pagetitle; ?></a>
</div>

<div role="main">
	<?php if (have_posts()) : ?>
		<header>
		  <h1><?php echo $pagetitle; ?></h1>
	 	</header>

	 	<section>
			<div class="news-index">
			<?php while (have_posts()) : the_post(); ?>
			  <article id="post-<?php the_ID(); ?>">
			  	<?php single_category_link(); ?>
		      <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			  </article>
			<?php endwhile; ?>
			</div>

			<div class="half">
			  <section class="center">
			  	<?php previous_posts_link('Newer') ?>
			  </section>
			  <section class="center">
			  	<?php next_posts_link('Older') ?>
			  </section>
			</div>
		</section>

	<?php else : ?>

		<h1>No posts found. Try a different search?</h1>

		<?php get_search_form(); ?>

	<?php endif; ?>
</div>

<?php get_footer(); ?>
