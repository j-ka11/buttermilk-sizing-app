<?php

namespace buttermilk\Core\Util;

class Sizing_Stream {

    private $checkout;

    public function __construct() {

    }

    public function register() {
        add_filter(
            'buttermilk_before_sizing_app',
            function() {
                return $this;
            }
        );
        add_action(
            'buttermilk_get_controller',
            function() {
                var_dump($this->checkout);
            }
        );
    }

    public function handle_checkout( $checkout ) {
        $this->checkout = $checkout;
    }

}
