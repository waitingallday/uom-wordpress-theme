<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */

$pagetitle = sprintf('Search Results for <b>%s</b>', get_search_query());
get_header(); ?>

<div class="page-local-history">
  <a class="root" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
	<span>/</span>
  <a href="."><?php echo $pagetitle; ?></a>
</div>

<div role="main">
	<?php if (have_posts()) : ?>
		<header>
		  <h1><?php echo $pagetitle; ?></h1>
	 	</header>

	 	<section>
			<div class="news-index short">
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

	  <form action="" class="search" method="get">
	    <fieldset>
	      <div class="inline">
	        <input aria-label="Search" aria-required="true" autocomplete="off" data-error="Please enter a keyword" name="s" placeholder="Search" type="search" />
	        <button class="search-button" type="submit" value="Go"><svg class="icon" role="img"><use xlink:href="#icon-search"></use></svg></button>
	      </div>
	    </fieldset>
	  </form>

	<?php endif; ?>
</div>

<?php get_footer(); ?>
