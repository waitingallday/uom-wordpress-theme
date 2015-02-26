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

function render_pages_list() {
  $pages = get_pages();
  print_r($pages);
  foreach ( (array) $pages as $page ) {
    echo '<li><a href="'.get_option('home').$page->slug.'">'.$page->name.'</a></li>';
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

function determine_archive_type() {
  $pagetitle = '';

  /* If this is a category archive */
  if (is_category()) {
    $pagetitle = 'Posted under <b>'.ucfirst(single_cat_title('', false)).'</b>';

  /* If this is a tag archive */
  } elseif( is_tag() ) {
    $pagetitle = 'Posts tagged with <b>'.single_tag_title('', false).'</b>';

  /* If this is a daily archive */
  } elseif (is_day()) {
    $pagetitle = 'Archive for '.get_the_time('F jS, Y');

  /* If this is a monthly archive */
  } elseif (is_month()) {
    $pagetitle = 'Archive for '.get_the_time('F, Y');

  /* If this is a yearly archive */
  } elseif (is_year()) {
    $pagetitle = 'Archive for '.get_the_time('Y');

  /* If this is an author archive */
  } elseif (is_author()) {
    $pagetitle = 'Author Archive';

  /* If this is a paged archive */
  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
    $pagetitle = 'Blog Archives';
  }

  return $pagetitle;
}