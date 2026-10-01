<?php

/**
 * Search Form class.
 *
 * Registers the Search Form custom post type,
 * creates the admin menu page,
 * and displays the Search Form meta box.
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
     * Render the Search Form meta box.
     *
     * Displays published post titles.
     * Clicking a title allows the user to mark that post
     * as excluded from search results.
     *
     */
    public function miluse_render_meta_box( $post ) {

      
    }
}