<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */
?>
<div id="sitemap" role="navigation" data-absolute-root="<?php echo get_option('home') ?>">
  <h2><?php bloginfo('name'); ?></h2>
  <ul>
  	<?php render_pages_list(); ?>
		<li>
		  <a href="<?php echo get_option('home') ?>/categories">Categories</a>
			<div class="inner">
				<?php render_categories_list(); ?>
			</div>
		</li>
		<li>
			<a href="/">Archives</a>
			<div class="inner">
				<ul>
        	<?php wp_get_archives(); ?>
        </ul>
			</div>
		</li>
		<!--li>
			<?php //get_search_form(); ?>
		</li-->
		<li><?php wp_loginout(); ?></li>
	</ul>
</div>
