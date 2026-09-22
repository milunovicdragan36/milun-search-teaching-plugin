<?php

/**
 * Plugin uninstall.
 *
 * @package MILUSE_Milun_Search
 */

// Exit if uninstall.php is not called by WordPress.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Get all Search Form posts.
$search_forms = get_posts(
    array(
        'post_type'      => 'miluse_search_post',
        'post_status'    => 'any',
        'posts_per_page' => -1,
        'fields'         => 'ids',
    )
);

// Permanently delete Search Form posts.
foreach ( $search_forms as $post_id ) {
    wp_delete_post( $post_id, true );
}