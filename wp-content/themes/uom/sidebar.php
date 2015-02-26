<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */
?>
<div id="sitemap" role="navigation" data-absolute-root="<?php echo get_option('home') ?>">
  <h2><?php bloginfo('name'); ?></h2>
  <ul>
		<li>
		  <a href="<?php echo get_option('home') ?>/categories">Categories</a>
			<div class="inner">
				<?php render_categories_list(); ?>
			</div>
		</li>
		<li>
			<?php get_search_form(); ?>
		</li>
		<li><?php wp_loginout(); ?></li>
	</ul>
</div>
