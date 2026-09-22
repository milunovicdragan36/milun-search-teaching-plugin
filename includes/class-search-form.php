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
     * Search Form custom post type.
     *
     * @var string
     */
    private $post_type = 'miluse_search_post';


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

        register_post_type(
            $this->post_type,
            array(
                'label'        => __( 'Search Form', 'milun-search' ),
                'public'       => false,
                'show_ui'      => true,
                'show_in_menu' => false,
                'supports'     => false,

                // Disable the "Add New" option.
                'capabilities' => array(
                    'create_posts' => 'do_not_allow',
                ),

                'map_meta_cap' => true,
            )
        );
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

        // Get the existing Search Form post.
        $search_form = get_posts(
            array(
                'post_type'      => $this->post_type,
                'post_status'    => array( 'publish', 'draft' ),
                'posts_per_page' => 1,
                'fields'         => 'ids',
            )
        );


        /**
         * Create the Search Form if it does not exist.
         */
        if ( empty( $search_form ) ) {

            $post_id = wp_insert_post(
                array(
                    'post_title'  => __( 'Search Form', 'milun-search' ),
                    'post_type'   => $this->post_type,
                    'post_status' => 'publish',
                )
            );

            // Stop if WordPress could not create the Search Form.
            if ( is_wp_error( $post_id ) || ! $post_id ) {
                return;
            }

        } else {

            // Use the existing Search Form.
            $post_id = (int) $search_form[0];
        }


        /**
         * Add Search Form as a top-level admin menu item.
         */
        add_menu_page(
            __( 'Search Form', 'milun-search' ),
            __( 'Search Form', 'milun-search' ),
            'manage_options',
            'post.php?post=' . $post_id . '&action=edit',
            '',
            'dashicons-search',
            25
        );
    }


    /**
     * Register the Search Form meta box.
     */
    public function miluse_add_meta_boxes() {

        add_meta_box(
            'miluse_exclude_posts',
            __( 'Search Form', 'milun-search' ),
            array( $this, 'miluse_render_meta_box' ),
            $this->post_type,
            'normal',
            'default'
        );
    }


    /**
     * Render the Search Form meta box.
     *
     * Displays published post titles.
     * Clicking a title allows the user to mark that post
     * as excluded from search results.
     *
     * @param WP_Post $post Current Search Form post.
     */
    public function miluse_render_meta_box( $post ) {

        // Get stored metadata for the current Search Form.
        $prfx_stored_meta = get_post_meta(
            $post->ID
        );

        global $wpdb;


        /**
         * Get titles of all published WordPress posts.
         */

        // phpcs:ignore WordPress.DB.DirectDatabaseQuery
        $titles = $wpdb->get_results(
            "SELECT post_title
             FROM {$wpdb->posts}
             WHERE post_type = 'post'
             AND post_status = 'publish'"
        );

        ?>

        <h4>
            <?php
            esc_html_e(
                'Click on the title of the post you want to exclude and mark it with red color.',
                'milun-search'
            );
            ?>
        </h4>


        <div class="titles_of_posts">

            <?php

            /**
             * Display each published post title.
             */
            foreach ( $titles as $post_title ) {

                // Check whether the current title is marked as hidden.
                $double_title = get_post_meta(
                    $post->ID,
                    $post_title->post_title,
                    true
                );

                ?>

                <div
                    <?php
                    echo $double_title === 'hidetitle'
                        ? 'style="background-color:pink; color:white;"'
                        : 'style="background-color:white; color:grey;"';
                    ?>

                    onclick='hideTitleFunction(
                        this,
                        <?php echo wp_json_encode( $post_title->post_title ); ?>
                    );'
                >
                    <?php echo esc_html( $post_title->post_title ); ?>
                </div>

                <?php
            }
            ?>

        </div>

        <?php
    }
}