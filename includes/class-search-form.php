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

        // Add meta boxes to the Search Form.
        add_action( 'add_meta_boxes', array( $this, 'miluse_add_meta_boxes' ) );
    }


    /**
     * Register the Search Form custom post type.
     */
    public function register_post_type() {
        register_post_type(
            'miluse_search_post',
            array(
                'label' => __('Search Form', 'milun-search'),
                'public' => false,
                'show_ui' => true,
                'show_in_menu' => true,
                'supports' => false,
                'capabilities' => array(
                    'create_posts' => 'do_not_allow',
                ),
                'map_meta_cap' => true
            )
        );
        
    }



/**
 * Add the Search Form meta box.
 */
    public function miluse_add_meta_boxes() {
        add_meta_box(
            'miluse_posts_titles',
            __('Search Form', 'milun-search'),
            array( $this,'miluse_search_visibility'),
            'miluse_search_post',
            'normal',
            'default'
        );
       
    }
    public function miluse_search_visibility($post) {
       esc_html_e('Click on the posttitle you want to exclude', 'milun-search');
    }

 
}