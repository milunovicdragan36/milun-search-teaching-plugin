<?php

class MILUSE_Admin {


    public function __construct() {

        add_action(
            'admin_enqueue_scripts',
            [$this, 'enqueue_admin_scripts']
        );

        add_action(
            'admin_enqueue_scripts',
            [$this, 'enqueue_admin_styles']
        );
    }


    /**
     * Register the stylesheets for the admin area.
     *
     * @since 1.0.0
     */
    public function enqueue_admin_styles() {

        wp_register_style(
            'miluse-admin-style',
            plugin_dir_url( __FILE__ ) . '../admin/css/admin.css',
            array(),
            '1.0',
            'all'
        );

        wp_enqueue_style( 'miluse-admin-style' );
    }


    /**
     * Register the JavaScript for the admin area.
     *
     * @since 1.0.0
     */
    public function enqueue_admin_scripts() {

        wp_enqueue_script( 'jquery' );


        wp_register_script(
            'miluse-admin',
            plugin_dir_url( __FILE__ ) . '../admin/js/admin.js',
            array( 'jquery' ),
            '1.0',
            true
        );

        wp_enqueue_script( 'miluse-admin' );


        wp_localize_script(
            'miluse-admin',
            'ajax_object',
            array(
                'ajax_url' => admin_url( 'admin-ajax.php' ),
            )
        );
    }
}