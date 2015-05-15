<?php
/**
 * @package WordPress
 * @subpackage uom_theme
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

  <section>
	<?php if (have_posts()) : ?>
		<div class="news-index">

		<?php while (have_posts()) : the_post(); ?>
		  <article id="post-<?php the_ID(); ?>">
		  	<?php single_category_link(); ?>
	      <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
	      <?php the_content('Read more'); ?>
		    <p>
		    	Posted <time datetime="<?php echo get_the_time('Y-m-j') ?>"><?php echo get_the_time('j F Y') ?></time>
			    <?php comments_popup_link(__('No Comments &#187;', 'kubrick'), __('1 Comment &#187;', 'kubrick'), __('% Comments &#187;', 'kubrick'), '', __('Comments Closed', 'kubrick') ); ?>
			    <?php edit_post_link('Edit'); ?>
			  </p>
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

<?php get_footer(); ?>
