<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */

get_header();
$banner = get_post_meta(get_the_ID(), 'banner');
if (count($banner) > 0)
	$banner = ' style="background-image:url('.$banner[0].')"';
?>

<div class="page-local-history">
  <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
	<span>/</span>
  <a href="."><?php the_title(); ?></a>
</div>

<div role="main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php if (count($banner) > 0): ?>
	<header class="banner"<?php echo $banner ?>></header>
	<article class="news" id="post-<?php the_ID(); ?>">
	<?php else: ?>
	<article class="news noheader" id="post-<?php the_ID(); ?>">
	<?php endif; ?>
		<div class="entry article">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
      <?php edit_post_link('Edit'); ?>
			<?php comments_template(); ?>
		</div>

		<aside>
      <div>
        <time datetime="<?php echo get_the_time('Y-m-j') ?>2014-09-22"><?php echo get_the_time('j F Y') ?></time>
      </div>
      <div>
	      <p>
	        <em>Categories</em>
	      </p>
	      <?php echo get_the_category_list(); ?>
	    </div>
		</aside>

		<footer></footer>
	</article>

<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>
<?php endif; ?>
</div>

<?php get_footer(); ?>
