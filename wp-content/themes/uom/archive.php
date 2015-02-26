<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */

$pagetitle = determine_archive_type();
get_header();
?>

<div class="page-local-history">
  <a class="last" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
	<span>/</span>
  <a href="."><?php echo $pagetitle; ?></a>
</div>

<div role="main">

	<?php if (have_posts()) : ?>
 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<header>
		  <h1><?php echo $pagetitle ?></h1>
	 	</header>

		<div class="news-index">
		<?php while (have_posts()) : the_post(); ?>
		  <article id="post-<?php the_ID(); ?>">
		  	<?php single_category_link(); ?>
	      <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
	      <?php the_content('Read more'); ?>
		    <?php edit_post_link('Edit', '', ' | '); ?>
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

	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>".__("Sorry, but there aren't any posts in the %s category yet.", 'kubrick').'</h2>', single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo('<h2>'.__("Sorry, but there aren't any posts with this date.", 'kubrick').'</h2>');
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>".__("Sorry, but there aren't any posts by %s yet.", 'kubrick')."</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>".__('No posts found.', 'kubrick').'</h2>');
		}

	  get_search_form();

	endif;
?>

</div>

<?php get_footer(); ?>
