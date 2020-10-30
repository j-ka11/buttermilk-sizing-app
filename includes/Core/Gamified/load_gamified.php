<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/includes/Core/Gamified/Controller.php';

buttermilk\Core\Gamified\Controller::start();
