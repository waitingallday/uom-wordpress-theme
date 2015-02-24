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

    $cat = $cats[0];

    print_r($cat);

    print_r($cat[slug]);

    return '<p class="topic"><a href="'.get_option('home').'/category/'.$cat['slug'].'">'.ucfirst($cats['name']).'</a></p>';
  }
}
