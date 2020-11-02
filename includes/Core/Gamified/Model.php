<?php

namespace buttermilk\Core\Gamified;

class Model {

    public function __construct() {}

    public function register() {
        add_action(
            'buttermilk_load_model',
            function() {
                $this->load_model();
            }
        );
    }

    private function load_model() {
        require_once dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/templates/sizing-model.php';
    }

    public function get_model_images( $body_part, $size ) {
        $img_dir = dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/assets/img/';

        $images = array();
        $images['front'] = array();
        $images['side'] = array();

        switch( $body_part ) {
            case 'abdomen':
                $abdomen_front = file_get_contents( $img_dir . '/front/abdomen/abdomen_' . $size . '.svg');
                $images['front'][] = $abdomen_front;
                if ( 0 !== strcmp( $size, 'XS') ) {
                    $tapas_abdomen_front = file_get_contents( $img_dir . '/front/tapas-abdomen/tapas-abdomen_' . $size . '.svg');
                    $images['front'][] = $tapas_abdomen_front;
                }

                $abdomen_side = file_get_contents( $img_dir . '/side/abdomen/abdomen_' . $size . '.svg');
                $images['side'][] = $abdomen_side;

                break;
            case 'chest':
                if ( 0 !== strcmp( $size, 'M') ) {
                    $chest_front = file_get_contents( $img_dir . '/front/chest/chest_' . $size . '.svg');
                    $images['front'][] = $chest_front;

                    $tapas_chest_front = file_get_contents( $img_dir . '/front/tapas-chest/tapas-chest_' . $size . '.svg');
                    $images['front'][] = $tapas_chest_front;
                }

                $chest_side = file_get_contents( $img_dir . '/side/chest/chest_' . $size . '.svg');
                $images['side'][] = $chest_side;
                if ( ( 0 !== strcmp( $size, 'XS' ) ) && ( 0 !== strcmp( $size, 'S' ) ) ) {
                    $tapas_chest_side = file_get_contents( $img_dir . '/side/tapas-chest/tapas-chest_' . $size . '.svg');
                    $images['side'][] = $tapas_chest_side;
                }

                break;
            case 'hips':
                $hips_front = file_get_contents( $img_dir . '/front/hips/hips_' . $size . '.svg');
                $images['front'][] = $hips_front;
                $tapas_hips_front = file_get_contents( $img_dir . '/front/tapas-hips/tapas-hips_' . $size . '.svg');
                $images['front'][] = $tapas_hips_front;

                $hips_side = file_get_contents( $img_dir . '/side/hips/hips_' . $size . '.svg');
                $images['side'][] = $hips_side;
                break;
        }
        return $images;
    }

}
