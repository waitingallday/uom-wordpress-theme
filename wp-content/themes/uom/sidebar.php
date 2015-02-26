<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */
?>
<div id="sitemap" role="navigation">
  <ul>
		<li>
		  Categories
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
