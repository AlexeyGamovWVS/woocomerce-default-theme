<?php if (!defined('ABSPATH')) {
  exit;
}

add_filter('woocommerce_enqueue_styles', '__return_empty_array');
add_filter('body_class', 'elshop_woocommerce_active_body_class');
add_filter('woocommerce_output_related_products_args', 'elshop_woocommerce_related_products_args');
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

function elshop_woocommerce_active_body_class($classes)
{
  $classes[] = 'woocommerce-active';
  return $classes;
}

function elshop_woocommerce_related_products_args($args)
{
  $defaults = array(
    'posts_per_page' => 3,
    'columns' => 3,
  );

  $args = wp_parse_args($defaults, $args);

  return $args;
}