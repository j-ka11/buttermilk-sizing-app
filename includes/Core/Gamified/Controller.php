<?php

namespace buttermilk\Core\Gamified;

use buttermilk\Core\Gamified\Slider;

class Controller {

    private static $instance = null;

    private $slider;

    public function __construct() {
        require_once dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/includes/Core/Gamified/Slider.php';

        $this->slider = new Slider();
    }

    public function register() {
        $this->slider->register();
        add_action(
            'wp_enqueue_scripts',
            function() {
                wp_enqueue_style( 'buttermilk-sizing-controller-style', '/wp-content/plugins/buttermilk-sizing-app/assets/css/sizing-controller.css' );
                wp_enqueue_style( 'buttermilk-sizing-slider-style', '/wp-content/plugins/buttermilk-sizing-app/assets/css/sizing-slider.css' );
            }
        );
        add_action(
            'buttermilk_get_controller',
            function() {
                $this->get_controller();
            }
        );
    }

    public static function start() {
        if ( null !== static::$instance ) {
            return false;
        }

        static::$instance = new static();
        static::$instance->register();

        return true;
    }

    public function get_controller() {
        require_once dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/templates/sizing-controller.php';
    }

}