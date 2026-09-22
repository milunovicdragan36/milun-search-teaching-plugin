<?php

class MILUSE_Ajax_Visibility {

    public function __construct() {

        add_action(
            'wp_ajax_select_visibility_title',
            [$this, 'select_visibility_title']
        );
    }


    /**
     * select_visibility_title
     *
     * This function will hide posts of specific posts' titles that are going
     * to appear as the searching criteria on the front end of the website.
     */
    public function select_visibility_title() {

        if ( isset( $_POST['nonce'] ) ) {

            if ( ! wp_verify_nonce(
                sanitize_title( wp_unslash( $_POST['nonce'] ) ),
                'ajax-nonce'
            ) ) {
                die( 'Busted!' );
            }
        }


        $args = array(
            'order'     => 'ASC',
            'post_type' => 'miluse_search_post',
        );


        if ( isset( $_POST['visibility_title'] ) ) {

            $meta_sk = sanitize_text_field(
                wp_unslash( $_POST['visibility_title'] )
            );


            $the_query = new \WP_Query( $args );


            // The Loop
            while ( $the_query->have_posts() ) :

                $the_query->the_post();


                $double_title = get_post_meta(
                    get_the_ID(),
                    $meta_sk,
                    true
                );


                if ( $double_title == 'hidetitle' ) {

                    delete_post_meta(
                        get_the_ID(),
                        $meta_sk,
                        'hidetitle'
                    );

                } else {

                    add_post_meta(
                        get_the_ID(),
                        $meta_sk,
                        'hidetitle'
                    );
                }

            endwhile;


            die();
        }
    }
}