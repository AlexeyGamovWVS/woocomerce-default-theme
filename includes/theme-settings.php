<?php
if (!defined('ABSPATH')) {
  exit;
}
if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

add_action('after_setup_theme', 'elshop_setup');
add_action('after_setup_theme', 'elshop_content_width', 0);

function elshop_setup()
{
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    )
  );
  add_theme_support('customize-selective-refresh-widgets');
  add_theme_support(
    'custom-logo',
    array(
      'height' => 250,
      'width' => 250,
      'flex-width' => true,
      'flex-height' => true,
    )
  );
  add_theme_support(
    'woocommerce',
    array(
      'thumbnail_image_width' => 150,
      'single_image_width' => 300,
      'product_grid' => array(
        'default_rows' => 3,
        'min_rows' => 1,
        'default_columns' => 4,
        'min_columns' => 1,
        'max_columns' => 6,
      ),
    )
  );
  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
}

function elshop_content_width()
{
  $GLOBALS['content_width'] = apply_filters('elshop_content_width', 640);
}