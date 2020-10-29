<?php

namespace buttermilk;

require_once plugin_dir_path(__FILE__) . './Core/Util/Sizing_Stream.php';

use buttermilk\Core\Util\Sizing_Stream;

class Plugin {

    private static $instance = null;

    private $sizing_stream;

    public function __construct() {
        $this->sizing_stream = new Sizing_Stream();
        $this->sizing_stream->register();
    }

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
            function( $checkout ) {
                $this->sizing_stream->handle_checkout( $checkout );
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
