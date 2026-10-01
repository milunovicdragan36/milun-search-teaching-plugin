<?php

/**
 * Main plugin class.
 *
 * Loads the required files and initializes
 * all plugin components.
 */
class MILUSE_Plugin {

    /**
     * Initialize the plugin.
     */
    public function __construct() {

        $this->miluse_load_dependencies();
        $this->miluse_init_components();
    }

    /**
     * Load the required plugin files.
     */
    public function miluse_load_dependencies() {


       require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-search-form.php';
        
    }

    /**
     * Initialize all plugin components.
     */
    public function miluse_init_components() {


        
        new MILUSE_Search_Form();

    }
}