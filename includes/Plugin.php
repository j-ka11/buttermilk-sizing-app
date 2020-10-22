<?php

namespace buttermilk;

class Plugin {

    private static $instance = null;

    public function __construct() {}

    public function register() {
        add_action('wp_body_open', function() {
           echo '<h1>hi</h1>';
        });
    }

    public static function load() {
        if ( null !== static::$instance ) {
            return false;
        }

        static::$instance = new static();
        static::$instance->register();

        return true;
    }

}
