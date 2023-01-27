<?php if (!defined('ABSPATH')) {
  exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Custom Data')
  ->where('post_type', '=', 'page')
  ->add_fields(
    array(
      Field::make('image', 'crb_photo'),
    )
  );