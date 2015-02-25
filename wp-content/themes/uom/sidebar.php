<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */
?>
<div id="sitemap" role="navigation">
  <div class="w">
    <ul>

			<li>
				<?php get_search_form(); ?>
			</li>

			<li>
			  Pages
			  <ul>
					<?php wp_list_pages(); ?>
				</ul>
			</li>
			<li>
			  Archives
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>
			<li>
			  Categories
			  <ul>
					<?php wp_list_categories('show_count=1'); ?>
				</ul>
			</li>
			<li><?php wp_loginout(); ?></li>
			<li><?php wp_meta(); ?></li>
		</ul>
	</div>
</div>
