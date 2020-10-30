<?php

namespace buttermilk\Core\Gamified;

class Slider {

    public function __construct() {}

    public function register() {
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