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
