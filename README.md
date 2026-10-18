# Milun Search – Learn WordPress Plugin Development by Building a Live Search Plugin

This repository contains the source code for the YouTube course **Learn WordPress Plugin Development by Building a Live Search Plugin**.

In this course, we build a custom WordPress live search plugin step by step using PHP, MySQL, JavaScript, jQuery, AJAX, the WordPress REST API, HTML, and CSS.

Each lesson introduces new functionality and explains important WordPress plugin development concepts.

## Lesson 04 – Create Plugin Header and Main Plugin Classes

In this lesson, we create the basic structure of our WordPress plugin.

### What we learn

- Create the main WordPress plugin file.
- Add the WordPress plugin header.
- Prevent direct access using `WPINC`.
- Include PHP class files using `require_once`.
- Understand `plugin_dir_path()` and `__FILE__`.
- Create the `MILUSE_Plugin` class.
- Load plugin dependencies.
- Initialize plugin components.
- Create the `MILUSE_Search_Form` class.
- Register WordPress action hooks.

## Lesson 05 – Create Search Form Custom Post Type

In this lesson, we register a custom post type for managing our search form.

### What we learn

- Understand WordPress custom post types.
- Register a custom post type using `register_post_type()`.
- Use the WordPress `init` action hook.
- Configure custom post type arguments.
- Display the Search Form in the WordPress administration area.
- Prevent users from creating additional Search Form posts using the `create_posts` capability.
- Understand `map_meta_cap`.

The custom post type slug is:

`miluse_search_post`

## Lesson 06 – Create Search Form Meta Box

In this lesson, we create a custom meta box for our Search Form.

### What we learn

- Understand WordPress meta boxes.
- Register a meta box using `add_meta_box()`.
- Use the `add_meta_boxes` action hook.
- Define a callback function for displaying meta box content.
- Understand the `normal` context and `default` priority.
- Use `esc_html_e()` to display translated and escaped text.

The meta box will be used to manage which WordPress posts are included in the live search results.

## Lesson 07 – Retrieve WordPress Post Titles Using $wpdb

In this lesson, we learn how to retrieve data directly from the WordPress database using the global `$wpdb` object.

We retrieve the titles of published WordPress posts from the `wp_posts` table and display the results using the PHP `print_r()` function.

### What we learn

- Understand the global `$wpdb` object.
- Access the WordPress database from a plugin.
- Understand the `wp_posts` database table.
- Write a basic SQL `SELECT` query.
- Filter posts using `WHERE`.
- Retrieve published posts using `post_status = 'publish'`.
- Retrieve standard WordPress posts using `post_type = 'post'`.
- Execute a database query using `$wpdb->get_results()`.
- Understand the objects returned by `get_results()`.
- Display retrieved data using `print_r()`.

### PHP code used in Lesson 07

```php
global $wpdb;

$titles = $wpdb->get_results(
    "SELECT post_title
     FROM {$wpdb->posts}
     WHERE post_type = 'post'
     AND post_status = 'publish'"
);

print_r( $titles );
```

### Code explanation

**`global $wpdb;`**

Makes the WordPress database object available inside the current function or method.

**`$wpdb->get_results()`**

Executes an SQL query and returns the results. By default, the results are returned as an array of objects.

**`SELECT post_title`**

Selects the `post_title` column from the database table.

**`FROM {$wpdb->posts}`**

Specifies the WordPress posts table, using the configured database table prefix.

**`WHERE post_type = 'post'`**

Retrieves only standard WordPress posts.

**`AND post_status = 'publish'`**

Retrieves only published posts.

**`print_r( $titles );`**

Displays the retrieved data for debugging and educational purposes.

### Example output

```text
Array
(
    [0] => stdClass Object
        (
            [post_title] => First Post
        )

    [1] => stdClass Object
        (
            [post_title] => Second Post
        )
)
```

Each returned object contains a `post_title` property.

The retrieved titles will be used in future lessons to develop the Search Form functionality.

## Plugin Structure

```text
milun-search-teaching-plugin/
├── milun-search-teaching-plugin.php
├── includes/
│   ├── class-plugin.php
│   └── class-search-form.php
└── README.md
```

## Technologies Used

- PHP
- MySQL
- WordPress Plugin API
- WordPress Database API
- Object-Oriented Programming (OOP)

Additional technologies will be introduced as the course progresses.

## Source Code

The source code for each lesson is available in this repository through Git tags.

**Lesson 05:**  
https://github.com/milunovicdragan36/milun-search-teaching-plugin/tree/lesson-05-create-search-form-custom-post-type

**Lesson 06:**  
https://github.com/milunovicdragan36/milun-search-teaching-plugin/tree/lesson-06

## Milun Search Plugin

You can also explore the completed Milun Search plugin on TemplateMonster.

Milun Search provides live search functionality for WordPress websites without requiring a page refresh.

## Course

Follow the **Milun Media** YouTube channel for step-by-step WordPress and WooCommerce plugin development tutorials.

## License

GPL-2.0-or-later