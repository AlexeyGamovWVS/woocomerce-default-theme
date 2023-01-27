<?php
// подключение карбон филдс
add_action('after_setup_theme', 'crb_load');
function crb_load()
{
  load_template(get_template_directory() . '/includes/carbon-fields/vendor/autoload.php');
  \Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'ast_register_custom_fields');
function ast_register_custom_fields()
{
  require get_template_directory() . '/includes/custom-fields-options/metabox.php';
  require get_template_directory() . '/includes/custom-fields-options/theme-options.php';
}
// Подключение настроек темы
require get_template_directory() . '/includes/theme-settings.php';
// Подключение виджетов
require get_template_directory() . '/includes/widget-areas.php';
// Стили и скрипты
require get_template_directory() . '/includes/enqueue-script-style.php';
// helpers
require get_template_directory() . '/includes/helpers.php';

// Features
require get_template_directory() . '/includes/custom-header.php';
require get_template_directory() . '/includes/template-tags.php';
require get_template_directory() . '/includes/template-functions.php';
require get_template_directory() . '/includes/customizer.php';
// Pluggins
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/includes/jetpack.php';
}
if (class_exists('WooCommerce')) {
  require get_template_directory() . '/includes/woocommerce.php';
  require get_template_directory() . '/woocommerce/includes/wc-functions-remove.php';
  require get_template_directory() . '/woocommerce/includes/wc-functions.php';
}