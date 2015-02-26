<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */

get_header();
?>

<div class="page-local-history">
  <a class="last" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
	<span>/</span>
  <a href="."><?php the_title(); ?></a>
</div>

<div role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article class="news" id="post-<?php the_ID(); ?>">
		<figure>
    	<img alt="" src="http://web.unimelb.edu.au/assets/components/news/assets/tsinghua_university_article-c41b725a850a46a090ee2c7cd2b5f9ec.jpg" />
  	</figure>

	  <div class="article">
			<h1><?php the_title(); ?></h1>

			<div class="entry">
				<?php the_content(); ?>
			</div>
		</div>
	</article>

	<footer class="postmetadata alt">
		<p>
			<?php /* This is commented, because it requires a little adjusting sometimes.
				You'll need to download this plugin, and follow the instructions:
				http://binarybonsai.com/wordpress/time-since/ */
				/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); $time_since = sprintf(__('%s ago', 'kubrick'), time_since($entry_datetime)); */ ?>
			<?php printf(__('This entry was posted on %1$s at %2$s and is filed under %3$s.', 'kubrick'), get_the_time(__('l, F jS, Y', 'kubrick')), get_the_time(), get_the_category_list(', ')); ?>
			<?php printf(__("You can follow any responses to this entry through the <a href='%s'>RSS 2.0</a> feed.", "kubrick"), get_post_comments_feed_link()); ?>

			<?php if ( comments_open() && pings_open() ) {
				// Both Comments and Pings are open ?>
				<?php printf(__('You can <a href="#respond">leave a response</a>, or <a href="%s" rel="trackback">trackback</a> from your own site.', 'kubrick'), get_trackback_url()); ?>

			<?php } elseif ( !comments_open() && pings_open() ) {
				// Only Pings are Open ?>
				<?php printf(__('Responses are currently closed, but you can <a href="%s" rel="trackback">trackback</a> from your own site.', 'kubrick'), get_trackback_url()); ?>

			<?php } elseif ( comments_open() && !pings_open() ) {
				// Comments are open, Pings are not ?>
				<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.', 'kubrick'); ?>

			<?php } elseif ( !comments_open() && !pings_open() ) {
				// Neither Comments, nor Pings are open ?>
				<?php _e('Both comments and pings are currently closed.', 'kubrick'); ?>

			<?php } edit_post_link(__('Edit this entry', 'kubrick'),'','.'); ?>

		</p>
	</footer>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>

<?php endif; ?>

</div>

<?php get_footer(); ?>
