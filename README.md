# Milun Search – WordPress Plugin Development Course

Learn WordPress plugin development by building a live search plugin step by step.

## Lesson 04 – Creating the Plugin Header and Main Plugin Classes

This is the first coding lesson in the Milun Search WordPress plugin development course.

In this lesson, we create the initial structure of the plugin, add the WordPress plugin header, and create the first two PHP classes that will form the foundation of the plugin.

## What We Build in This Lesson

In Lesson 04, we:

- Create the main plugin file
- Add the WordPress plugin header
- Prevent direct access to the main plugin file
- Load the main plugin class
- Create the `MILUSE_Plugin` class
- Load the Search Form class
- Create the `MILUSE_Search_Form` class
- Initialize the plugin components
- Prepare WordPress action hooks for the Search Form functionality

## Plugin Structure

At the end of this lesson, the plugin has the following structure:

milun-search-teaching-plugin/
│
├── milun-search-teaching-plugin.php
│
└── includes/
    ├── class-plugin.php
    └── class-search-form.php

## Main Plugin File

The `milun-search-teaching-plugin.php` file is the entry point of the plugin.

It contains the WordPress plugin header with information such as:

- Plugin name
- Plugin URI
- Description
- Version
- Required PHP version
- Author
- Author URI
- Text domain
- License

The file also prevents direct access using `WPINC`.

It then loads the main plugin class from:

`includes/class-plugin.php`

Finally, it creates an instance of the `MILUSE_Plugin` class to start the plugin.

## MILUSE_Plugin Class

The `MILUSE_Plugin` class is the main plugin class.

Its constructor performs two main tasks:

1. Loads the required plugin dependencies
2. Initializes the plugin components

The `miluse_load_dependencies()` method loads the Search Form class:

`includes/class-search-form.php`

The `miluse_init_components()` method creates an instance of:

`MILUSE_Search_Form`

This provides the basic object-oriented structure that will be expanded throughout the course.

## MILUSE_Search_Form Class

The `MILUSE_Search_Form` class provides the initial structure for the Search Form functionality.

Its constructor registers WordPress action hooks for:

- Registering the Search Form custom post type
- Adding the Search Form to the WordPress admin menu
- Adding the Search Form meta box

The following methods are prepared in this lesson:

- `register_post_type()`
- `search_form_menu()`
- `miluse_add_meta_boxes()`

At this stage, these methods provide the structure for functionality that will be implemented step by step in the following lessons.

## What's Next?

In the next lessons, we will continue developing the `MILUSE_Search_Form` class and begin implementing its functionality.

## Course

**Learn WordPress Plugin Development by Building a Live Search Plugin**

The Milun Search plugin is developed progressively throughout the course.

The `main` branch contains the completed version of the plugin.

The `lessons` branch contains the course version that is built step by step.