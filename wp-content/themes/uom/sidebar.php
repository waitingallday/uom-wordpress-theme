<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */
?>
<div id="sitemap" role="navigation" data-absolute-root="<?php echo get_option('home') ?>">
  <h2><?php bloginfo('name'); ?></h2>
  <ul>
  	<?php
  		render_pages_list();
  		render_categories_list();
  		if (count_categories() > 0): ?>
    <li>
      <a href="/">Archives</a>
      <div class="inner">
				<?php wp_get_archives(); ?>
      </div>
    </li>
    <?php end; ?>
		<li>
		  <form action="<?php echo get_option('home') ?>/" class="search" method="get">
		    <fieldset>
		      <div class="inline">
		        <input aria-label="Search" aria-required="true" autocomplete="off" data-error="Please enter a keyword" name="s" placeholder="Search" type="search" />
		        <button class="search-button" type="submit" value="Go"><svg class="icon" role="img"><use xlink:href="#icon-search"></use></svg></button>
		      </div>
		    </fieldset>
		  </form>
		</li>
		<li><?php wp_loginout(); ?></li>
	</ul>
</div>
