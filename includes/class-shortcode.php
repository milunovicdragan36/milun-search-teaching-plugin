<?php

/**
 * Handles the Milun Search shortcode.
 *
 * Creates and displays the search form
 * on the front end.
 */
class MILUSE_Shortcode {

    /**
     * Register the search shortcode.
     */
    public function __construct() {

        add_shortcode(
            'miluse_search_post',
            [ $this, 'miluse_add_search_box_2' ]
        );
    }

    /**
     * Display the search form.
     */
    public function miluse_add_search_box_2() {

        ob_start();

        // Get the search form post.
        $posts = get_posts(
            [
                'post_type' => 'miluse_search_post',
            ]
        );

        // Store the search form ID.
        foreach ( $posts as $post ) {
            ?>
            <input
                type="hidden"
                id="search_post_id"
                value="<?php echo esc_attr( $post->ID ); ?>"
            >
            <?php
        }

        ?>

        <div class="search-container">

            <input
                type="text"
                class="search-term-shortcode"
                placeholder="<?php esc_attr_e( 'Search...', 'milun-search' ); ?>"
            >

            <div class="wrapper-data-container-shortcode-data-posts">

                <div class="data-container-shortcode"></div>

                <div class="no-data-shortcode"></div>

            </div>

        </div>

        <?php

        return ob_get_clean();
    }
}