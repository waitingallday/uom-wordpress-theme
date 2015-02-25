<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */
?>
<div id="sitemap" role="navigation">
  <ul>
		<?php wp_list_pages(); ?>
		<li>
		  Archives
			<div class="inner">
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</div>
		</li>
		<li>
		  Categories
			<div class="inner">
			  <ul>
					<?php wp_list_categories('show_count=1'); ?>
				</ul>
			</div>
		</li>
		<li>
			<?php get_search_form(); ?>
		</li>
		<li><?php wp_loginout(); ?></li>
	</ul>
</div>
