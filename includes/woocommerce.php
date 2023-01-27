<?php

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function elshop_woocommerce_scripts()
{
  wp_enqueue_style('elshop-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION);

  $font_path = WC()->plugin_url() . '/assets/fonts/';
  $inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

  wp_add_inline_style('elshop-woocommerce-style', $inline_font);
}
add_action('wp_enqueue_scripts', 'elshop_woocommerce_scripts');

if (!function_exists('elshop_woocommerce_wrapper_before')) {
  function elshop_woocommerce_wrapper_before()
  {
    ?>
    <main id="primary" class="site-main">
    <?php
  }
}
add_action('woocommerce_before_main_content', 'elshop_woocommerce_wrapper_before');

if (!function_exists('elshop_woocommerce_wrapper_after')) {
  function elshop_woocommerce_wrapper_after()
  {
    ?>
    </main><!-- #main -->
  <?php
  }
}
add_action('woocommerce_after_main_content', 'elshop_woocommerce_wrapper_after');


if (!function_exists('elshop_woocommerce_cart_link_fragment')) {
  function elshop_woocommerce_cart_link_fragment($fragments)
  {
    ob_start();
    elshop_woocommerce_cart_link();
    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
  }
}
add_filter('woocommerce_add_to_cart_fragments', 'elshop_woocommerce_cart_link_fragment');

if (!function_exists('elshop_woocommerce_cart_link')) {
  function elshop_woocommerce_cart_link()
  {
    ?>
    <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>"
      title="<?php esc_attr_e('View your shopping cart', 'elshop'); ?>">
      <?php
      $item_count_text = sprintf(
        /* translators: number of items in the mini cart. */
        _n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'elshop'),
        WC()->cart->get_cart_contents_count()
      );
      ?>
      <span class="amount">
        <?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?>
      </span> <span class="count">
        <?php echo esc_html($item_count_text); ?>
      </span>
    </a>
  <?php
  }
}

/**
* Sample implementation of the WooCommerce Mini Cart.
*
* You can add the WooCommerce Mini Cart to header.php like so ...
*
<?php
if ( function_exists( 'elshop_woocommerce_header_cart' ) ) {
elshop_woocommerce_header_cart();
}
?>
*/

if (!function_exists('elshop_woocommerce_header_cart')) {
  function elshop_woocommerce_header_cart()
  {
    if (is_cart()) {
      $class = 'current-menu-item';
    } else {
      $class = '';
    }
    ?>
    <ul id="site-header-cart" class="site-header-cart">
      <li class="<?php echo esc_attr($class); ?>">
        <?php elshop_woocommerce_cart_link(); ?>
      </li>
      <li>
        <?php
        $instance = array(
          'title' => '',
        );

        the_widget('WC_Widget_Cart', $instance);
        ?>
      </li>
    </ul>
  <?php
  }
}