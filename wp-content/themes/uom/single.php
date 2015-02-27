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
	<article class="news" id="post-<?php the_ID(); ?>">
		<div class="entry article">
			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

			<p class="postmetadata alt">
				<small>
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

				<?php } edit_post_link('Edit'); ?>
				</small>
			</p>

		</div>

		<aside>
      <div>
        <time datetime="2014-09-22">22 September 2014</time>
      </div>
      <div>
	      <p>
	        <em>Categories</em>
	      </p>
	      <ul>
	        <li>
	          <a href="#">Sustainability</a>
	        </li>
	        <li>
	          <a href="#">Tim Flannery</a>
	        </li>
	        <li>
	          <a href="#">Melbourne Sustainable Society Institute</a>
	        </li>
	      </ul>
	    </div>
		</aside>

		<footer></footer>
	</article>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>

<?php endif; ?>

</div>

<?php get_footer(); ?>
