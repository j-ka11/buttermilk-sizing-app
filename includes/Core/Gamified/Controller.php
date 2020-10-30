<?php

namespace buttermilk\Core\Gamified;

class Controller {

    private static $instance = null;

    public function __construct() {}

    public function register() {
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