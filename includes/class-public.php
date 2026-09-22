<?php

/**
 * Handles public-facing scripts and styles.
 */
class MILUSE_Public {

    /**
     * Register public hooks.
     */
    public function __construct() {

        add_action(
            'wp_enqueue_scripts',
            [ $this, 'enqueue_public_styles' ]
        );

        add_action(
            'wp_enqueue_scripts',
            [ $this, 'enqueue_public_scripts' ]
        );
    }


    /**
     * Load public styles.
     */
    public function enqueue_public_styles() {

        wp_enqueue_style(
            'miluse-public',
            plugin_dir_url( __FILE__ ) . '../public/css/public.css',
            [],
            '1.0',
            'all'
        );
    }


    /**
     * Load public scripts.
     */
    public function enqueue_public_scripts() {

        wp_enqueue_script( 'jquery' );

        wp_enqueue_script(
            'live-search-shortcode',
            plugin_dir_url( __FILE__ ) . '../public/js/live-search-shortcode.js',
            [ 'jquery' ],
            '1.0',
            true
        );


        // Data used by the live search JavaScript.
        $live_search_data = [
            [
                'search_results' => __(
                    'Search Results',
                    'milun-search'
                ),

                'not_found_data' => __(
                    'We could not find any posts for your search. You can give it another try with different criteria.',
                    'milun-search'
                ),

                'read_more' => __(
                    'Read more...',
                    'milun-search'
                ),
            ],

            [
                'root_url' => get_rest_url(),
            ],
        ];


        // Make PHP data available to JavaScript.
        wp_localize_script(
            'live-search-shortcode',
            'liveSearchDataPosts',
            $live_search_data
        );
    }
}