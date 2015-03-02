<?php
/**
 * Implement a custom header for Twenty Thirteen
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage uom_theme
 */

/**
 * Set up the WordPress core custom header arguments and settings.
 */
function custom_header_setup() {
  $defaults = array(
    'default-image'          => '%s/images/headers/stars.jpg',
    'height'                 => 1500,
    'width'                  => 2000,
    'uploads'                => true
    //,
    // 'wp-head-callback'       => 'header_style',
    // 'admin-head-callback'    => 'admin_header_style',
    // 'admin-preview-callback' => 'admin_header_image',
  );
  add_theme_support( 'custom-header', $defaults );
}

add_action( 'after_setup_theme', 'custom_header_setup', 11 );


/**
 * Style the header image displayed on the Appearance > Header admin panel.
 */
function admin_header_style() {
  $header_image = get_header_image();
?>
  <style type="text/css" id="admin-header-css">
  .appearance_page_custom-header #headimg {
    border: none;
    -webkit-box-sizing: border-box;
    -moz-box-sizing:    border-box;
    box-sizing:         border-box;
    <?php
    if ( ! empty( $header_image ) ) {
      echo 'background: url(' . esc_url( $header_image ) . ') no-repeat scroll top; background-size: 1600px auto;';
    } ?>
    padding: 0 20px;
  }
  #headimg .home-link {
    -webkit-box-sizing: border-box;
    -moz-box-sizing:    border-box;
    box-sizing:         border-box;
    margin: 0 auto;
    max-width: 1040px;
    <?php
    if ( ! empty( $header_image ) || display_header_text() ) {
      echo 'min-height: 230px;';
    } ?>
    width: 100%;
  }
  <?php if ( ! display_header_text() ) : ?>
  #headimg h1,
  #headimg h2 {
    position: absolute !important;
    clip: rect(1px 1px 1px 1px); /* IE7 */
    clip: rect(1px, 1px, 1px, 1px);
  }
  <?php endif; ?>
  #headimg h1 {
    font: bold 60px/1 Bitter, Georgia, serif;
    margin: 0;
    padding: 58px 0 10px;
  }
  #headimg h1 a {
    text-decoration: none;
  }
  #headimg h1 a:hover {
    text-decoration: underline;
  }
  #headimg h2 {
    font: 200 italic 24px "Source Sans Pro", Helvetica, sans-serif;
    margin: 0;
    text-shadow: none;
  }
  .default-header img {
    max-width: 230px;
    width: auto;
  }
  </style>
<?php
}

/**
 * Output markup to be displayed on the Appearance > Header admin panel.
 *
 * This callback overrides the default markup displayed there.
 */
function admin_header_image() {
  ?>
  <div id="headimg" style="background: url(<?php header_image(); ?>) no-repeat scroll top; background-size: 1600px auto;">
    <?php $style = ' style="color:#' . get_header_textcolor() . ';"'; ?>
    <div class="home-link">
      <h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="#"><?php bloginfo( 'name' ); ?></a></h1>
      <h2 id="desc" class="displaying-header-text"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></h2>
    </div>
  </div>
<?php }
