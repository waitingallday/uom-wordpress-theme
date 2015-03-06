<?php
/**
 * @package WordPress
 * @subpackage uom_theme
 */

/**
 * Add support for a custom header image.
 */
function custom_header_setup() {
  $defaults = array(
    'default-image'          => '%s/images/headers/stars.jpg',
    'height'                 => 1500,
    'width'                  => 2000,
    'uploads'                => true
  );
  add_theme_support('custom-header', $defaults);
}

add_action('after_setup_theme', 'custom_header_setup');

add_theme_support('automatic-feed-links');

add_filter('next_posts_link_attributes', 'button_hero');
add_filter('previous_posts_link_attributes', 'button_hero_reverse');

function button_hero() {
  return 'class="button-hero"';
}

function button_hero_reverse() {
  return 'class="button-hero-reverse"';
}

function get_banner() {
  $banner = get_post_meta(get_the_ID(), 'banner');
  if (count($banner) > 0)
    $banner = ' style="background-image:url('.$banner[0].')"';

  return $banner;
}

function single_category_link() {
  $cats = get_the_category();
  if (count($cats) > 0) {
    echo '<p class="topic"><a href="'.get_option('home').'/category/'.$cats[0]->slug.'">'.ucfirst($cats[0]->name).'</a></p>';
  }
}

function render_archives_list() {
  $cats = get_categories();
  if (count($cats) > 0) {
    echo '<ul>';
    foreach ( (array) $cats as $cat ) {
      echo '<li><a href="'.get_option('home').'/category/'.$cat->slug.'">'.ucfirst($cat->name).' ('.$cat->count.')</a></li>';
    }
    echo '</ul>';
  }
}

function get_page_template_type($post_id = null) {
  $post = get_post( $post_id );
  if ( 'page' != $post->post_type )
    return false;
  $template = get_post_meta( $post->ID, '_wp_page_template', true );
    if ( ! $template || 'default' == $template )
      return '';
  return $template;
}

function render_pages_list() {
  $pages = get_pages();

  // 2 level parent-child menu
  foreach ( (array) $pages as $page )
    if (0 === $page->post_parent && "publish" === $page->post_status) {
      echo '<li>'.get_page_template_type($page->ID).'<a href="'.get_option('home').'/'.$page->post_name.'">'.$page->post_title.'</a>';

      $c = 0;
      foreach ( (array) $pages as $p )
        if ($page->ID === $p->post_parent && "publish" === $p->post_status)
          $c++;

      if ($c > 0) {
        echo '<div class="inner"><ul>';
        echo '<li><a href="'.get_option('home').'/'.$page->post_name.'">'.$page->post_title.'</a>';
        foreach ( (array) $pages as $p )
          if ($page->ID === $p->post_parent && "publish" === $p->post_status)
            echo '<li><a href="'.get_option('home').'/'.$p->post_name.'">'.$p->post_title.'</a></li>';
        echo '</ul></div>';

      }

      echo '</li>';
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