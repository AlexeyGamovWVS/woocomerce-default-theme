<?php
if (!defined('ABSPATH')) {
  exit;
}
add_action('widgets_init', 'elshop_widgets_init');
function elshop_widgets_init()
{
  register_sidebar(
    array(
      'name' => esc_html__('Sidebar', 'elshop'),
      'id' => 'sidebar-1',
      'description' => esc_html__('Add widgets here.', 'elshop'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    )
  );
}