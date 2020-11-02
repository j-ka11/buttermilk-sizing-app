<?php

namespace buttermilk\Core\Gamified;

class Controller {

    private static $instance = null;

    private $model;

    private $slider;

    public function __construct() {
        require_once dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/includes/Core/Gamified/Model.php';
        require_once dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/includes/Core/Gamified/Slider.php';

        $this->model = new Model();
        $this->slider = new Slider();
    }

    public function register() {
        $this->model->register();
        $this->slider->register();

        add_action(
            'rest_api_init',
            function() {
                $this->register_endpoints();
            }
        );
        add_action(
            'wp_enqueue_scripts',
            function() {
                wp_enqueue_style( 'buttermilk-sizing-controller-style', '/wp-content/plugins/buttermilk-sizing-app/assets/css/sizing-controller.css' );
                wp_enqueue_style( 'buttermilk-sizing-slider-style', '/wp-content/plugins/buttermilk-sizing-app/assets/css/sizing-slider.css' );
                wp_enqueue_style( 'buttermilk-sizing-model-style', '/wp-content/plugins/buttermilk-sizing-app/assets/css/sizing-model.css' );
            }
        );
        add_action(
            'buttermilk_get_controller',
            function() {
                $this->get_controller();
            }
        );
    }

    private function register_endpoints() {
        register_rest_route(
            'buttermilk/v1',
            '/model/(?P<code>\d+)',
            array(
                'methods'  => 'GET',
                'callback' => function( \WP_REST_Request $request ) {
                    return $this->serve_model_images( $request );
                }
            )
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

    private function get_controller() {
        require_once dirname( constant( 'BUTTERMILK_PLUGIN_MAIN_FILE' ) ) . '/templates/sizing-controller.php';
    }

    private function serve_model_images( \WP_REST_Request $request ) {
        $code_map = array();
        $code_map['size'] = array(
            0 => 'XS',
            1 => 'S',
            2 => 'M',
            3 => 'L',
            4 => 'XL'
        );
        $code_map['body_part'] = array(
            0 => 'abdomen',
            1 => 'chest',
            2 => 'hips'
        );

        $code = $request['code'];

        $size_code = $code % 10;
        $size = $code_map['size'][ $size_code ];

        $body_part_code = $code / 10;
        $body_part = $code_map['body_part'][ $body_part_code ];

        $images = $this->model->get_model_images( $body_part, $size );
        return new \WP_REST_Response( $images );
    }

}