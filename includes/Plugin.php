<?php

namespace buttermilk;

class Plugin {

    private static $instance = null;

    public function __construct() {}

    public function register() {
        add_action(
            'wp_enqueue_scripts',
            function() {
                wp_enqueue_style( 'buttermilk-sizing-modal-style', '/wp-content/plugins/buttermilk-sizing-app/assets/css/sizing-modal.css' );
                wp_enqueue_script( 'buttermilk-sizing-modal-script', '/wp-content/plugins/buttermilk-sizing-app/assets/js/close_sizing_modal.js' );
            }
        );
        add_action(
            'woocommerce_after_checkout_form',
            function() {
                $this->display_modal();
            }
        );
    }

    public static function load() {
        if ( null !== static::$instance ) {
            return false;
        }

        static::$instance = new static();
        static::$instance->register();

        return true;
    }

    private function display_modal() {
        require_once dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/templates/sizing-modal.php';
    }

}
