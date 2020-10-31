<?php

namespace buttermilk\Core\Gamified;

class Model {

    public function __construct() {}

    public function register() {
        add_action(
            'buttermilk_get_model',
            function() {
                $this->get_model();
            }
        );
    }

    private function get_model() {
        require_once dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/templates/sizing-model.php';
    }

}
