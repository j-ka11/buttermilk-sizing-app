<?php

namespace buttermilk\Core\Gamified;

class Slider {

    public function __construct() {}

    public function register() {
        add_action(
            'wp_enqueue_scripts',
            function() {
                wp_enqueue_script( 'buttermilk-sizing-slider-script', '/wp-content/plugins/buttermilk-sizing-app/assets/js/sizing-slider.js' );
            }
        );
        add_action(
            'buttermilk-get-slider',
            function() {
                $this->get_slider();
            }
        );
    }

    public function get_slider() {
        require_once dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/templates/sizing-slider.php';
    }
}