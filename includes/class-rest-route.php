<?php
class MILUSE_Rest_Route{


public function __construct(){
   

add_action( "rest_api_init", [$this,'namespace_register_search_post_types'] );

}







//rest api endpoint for searching posts on front end
public function namespace_register_search_post_types() {
    register_rest_route('namespace/v11', '/search_post_types/(?P<s>[a-zA-Z0-9-]+)/(?P<id>\d+)/', [
        'methods' => \WP_REST_Server::READABLE,
        'callback' => [$this,'return_post_types'],
        'permission_callback' => '__return_true',
        'args' => [$this->namespace_get_search_args()]
    ]);
    
}





/**
 * Define the argument our endpoint receives.
 */
public function namespace_get_search_args() {
    $args = [];
    $args['s'] = [
       'type'        => 'string',
   ];
  
   return $args;
}





public function return_post_types($request){

global $wpdb;

$post_slug = $request['s'];

// phpcs:ignore WordPress.DB.DirectDatabaseQuery
$title_database = $wpdb->get_results(
    $wpdb->prepare(
        "SELECT *
         FROM wp_posts
         LEFT JOIN wp_postmeta
             ON wp_posts.post_title = wp_postmeta.meta_key
         WHERE wp_posts.post_title LIKE %s 
         AND wp_posts.post_type = 'post' 
         AND wp_posts.post_status = 'publish'
         AND (
             wp_postmeta.meta_value != 'hidetitle'
             OR wp_postmeta.meta_value IS NULL
         )",
        '%' . $wpdb->esc_like( $post_slug ) . '%'
    )
);

return $title_database;

  }





}
