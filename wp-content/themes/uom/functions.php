<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */

add_theme_support( 'automatic-feed-links' );

add_filter('next_posts_link_attributes', 'button_hero');
add_filter('previous_posts_link_attributes', 'button_hero_reverse');

function button_hero() {
  return 'class="button-hero"';
}

function button_hero_reverse() {
  return 'class="button-hero-reverse"';
}

function single_category_link() {
  $cats = get_the_category();
  if (count($cats) > 0) {
    echo '<p class="topic"><a href="'.get_option('home').'/category/'.$cats[0]->slug.'">'.ucfirst($cats[0]->name).'</a></p>';
  }
}

function render_categories_list() {
  $cats = get_categories();
  if (count($cats) > 0) {
    echo '<ul>';
    foreach ( (array) $cats as $cat ) {
      echo '<li><a href="'.get_option('home').'/category/'.$cat->slug.'">'.ucfirst($cat->name).' ('.$cat->count.')</a></li>';
    }
    echo '</ul>';
  }
}
