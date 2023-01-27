<?php
if (!defined('ABSPATH')) {
  exit;
}

add_action('wp_enqueue_scripts', 'elshop_scripts');
add_action('wp_enqueue_scripts', 'elshop_styles');
function elshop_styles()
{
  wp_enqueue_style('elshop-style', get_stylesheet_uri(), array(), _S_VERSION);
  wp_style_add_data('elshop-style', 'rtl', 'replace');
}
function elshop_scripts()
{
  wp_enqueue_script('elshop-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}