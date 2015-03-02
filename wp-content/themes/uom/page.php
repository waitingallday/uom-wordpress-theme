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
	<?php endif; ?>

	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="entry">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</div>

	<?php endwhile; endif; ?>
	<?php edit_post_link('Edit'); ?>
</div>

<?php get_footer(); ?>
