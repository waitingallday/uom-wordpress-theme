<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */

get_header(); ?>

<div class="floating"></div>
<div role="main">
  <header class="banner" style="background-image:url(http://web.unimelb.edu.au/assets/images/stars.jpg)">
  	<div class="mid-align">
	    <h1><?php bloginfo('name'); ?></h1>
  	  <p><?php bloginfo('description'); ?></p>
	  </div>
  </header>

  <section>
	<?php if (have_posts()) : ?>
		<div class="news-index">

		<?php while (have_posts()) : the_post(); ?>
		  <article id="post-<?php the_ID(); ?>">
		  	<?php single_category_link(); ?>
	      <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
	      <?php the_content('Read more'); ?>
		    <?php edit_post_link('Edit', '', ' | '); ?>
		  </article>
		<?php endwhile; ?>

		<div class="half">
		  <section class="center">
		  	<?php previous_posts_link('Newer') ?>
		  </section>
		  <section class="center">
		  	<?php next_posts_link('Older') ?>
		  </section>
		</div>

	<?php else : ?>

		<h2><?php _e('Not Found', 'kubrick'); ?></h2>
		<p><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'kubrick'); ?></p>

		<?php get_search_form(); ?>

	<?php endif; ?>
		</div>
	</section>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
