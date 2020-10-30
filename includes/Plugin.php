<?php

namespace buttermilk;

use buttermilk\Core\Gamified\Controller;

class Plugin {

    private static $instance = null;

    private $categories;

    public function __construct() {}

    public function register() {
        add_action(
            'wp_enqueue_scripts',
            function() {
                wp_enqueue_style( 'buttermilk-sizing-modal-style', '/wp-content/plugins/buttermilk-sizing-app/assets/css/sizing-modal.css' );
                wp_enqueue_style( 'buttermilk-sizing-app-style', '/wp-content/plugins/buttermilk-sizing-app/assets/css/sizing-app.css' );

                wp_enqueue_script( 'buttermilk-sizing-modal-script', '/wp-content/plugins/buttermilk-sizing-app/assets/js/close_sizing_modal.js' );
            }
        );
        add_action(
            'woocommerce_after_checkout_form',
            function() {
                $wc_cart = WC()->cart->get_cart();
                $this->prepare_checkout( $wc_cart );
                $this->display_modal();
            }
        );
        add_action(
            'buttermilk_sizing_app',
            function() {
                $this->load_sizing_app();
            }
        );
    }

    public static function load() {
        if ( null !== static::$instance ) {
            return false;
        }

        static::$instance = new static();
        static::$instance->register();

        require_once dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/includes/Core/Gamified/load_gamified.php';

        return true;
    }

    public static function BM() {
        if ( null === static::$instance ) {
            return false;
        }

        return static::$instance;
    }

    private function display_modal() {
        require_once dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/templates/sizing-modal.php';
    }

    private function load_sizing_app() {
        require_once dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/templates/sizing-app.php';
    }

    private function prepare_checkout( $wc_cart ) {
        foreach ( $wc_cart as $cart_item_key => $cart_item ) {
            $product = $cart_item['data'];
            $product_cat_ids = $product->get_category_ids();
            foreach ( $product_cat_ids as $cat_id ) {
                $cat_term = get_term_by( 'id', $cat_id, 'product_cat' );
                $this->categories[] = $cat_term->name;
            }
        }
    }

}
