<?php

/**
 * Search Form class.
 *
 * Provides the structure for the Search Form
 * functionality used by the plugin.
 */
class MILUSE_Search_Form {


    /**
     * Initialize the Search Form functionality.
     */
    public function __construct() {

        // Register the custom post type.
        add_action( 'init', array( $this, 'register_post_type' ) );

        // Add Search Form to the WordPress admin menu.
        add_action( 'admin_menu', array( $this, 'search_form_menu' ) );

        // Add meta boxes to the Search Form.
        add_action( 'add_meta_boxes', array( $this, 'miluse_add_meta_boxes' ) );
    }


    /**
     * Register the Search Form custom post type.
     */
    public function register_post_type() {

       
    }


    /**
     * Add Search Form to the admin menu.
     *
     * If a Search Form does not exist,
     * create one automatically.
     *
     * The admin menu then opens the
     * existing Search Form directly.
     */
    public function search_form_menu() {

    
    }


/**
 * Add the Search Form meta box.
 *
 * The meta box functionality will be implemented
 * in a later lesson.
 */
    public function miluse_add_meta_boxes() {

      
    }
}