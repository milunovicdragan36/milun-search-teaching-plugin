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

## Lesson 08 – Display WordPress Post Titles Using a PHP Foreach Loop

In this lesson, we continue developing the Milun Search WordPress plugin by learning how to display the retrieved WordPress post titles using a PHP `foreach` loop.

We iterate through the array of objects returned by `$wpdb->get_results()` and display each published post title using the PHP `echo` statement and the WordPress `esc_html()` function.

### What we learn

- Understand the PHP `foreach` loop.

- Iterate through an array of objects.

- Understand how to access the current object in an array.

- Access an object property using the `->` operator.

- Retrieve the `post_title` property from each object.

- Display WordPress post titles using the PHP `echo` statement.

- Understand the purpose of the WordPress `esc_html()` function.

- Escape HTML output for safe display.

- Combine PHP and HTML to display dynamic content.

- Organize retrieved post titles inside HTML `div` elements.

### PHP code used in Lesson 08

The following code uses the `$titles` array retrieved in Lesson 07.

```php

?>

<div class="titles_of_posts">

    <?php

    /**

     * Display each published post title.

     */

    foreach ( $titles as $title_object ) {

        ?>

        <div>

            <?php echo esc_html( $title_object->post_title ); ?>

        </div>

        <?php

    }

    ?>

</div>

<?php

```

### Code explanation

**`<div class="titles_of_posts">`**

Creates an HTML `div` element with the CSS class `titles_of_posts`.

This element acts as a container for the WordPress post titles.

**`foreach ( $titles as $title_object )`**

The PHP `foreach` loop iterates through the `$titles` array.

The `$titles` variable contains an array of objects retrieved from the WordPress database.

During each iteration, `$title_object` represents the current object in the array.

**`$title_object->post_title`**

Accesses the `post_title` property of the current object.

The `->` operator is used to access properties and methods of an object in PHP.

In this example, the `post_title` property contains the title of a WordPress post.

**`esc_html( $title_object->post_title )`**

The WordPress `esc_html()` function escapes special HTML characters before displaying the post title.

This ensures that the post title is safely displayed as text instead of being interpreted as HTML markup.

**`echo esc_html( $title_object->post_title );`**

The PHP `echo` statement outputs the escaped post title to the page.

**`<div>`**

Each post title is displayed inside its own HTML `div` element.

This allows us to organize and style the titles using CSS.

### Example output

If the `$titles` array contains three published WordPress posts, the generated HTML will look like this:

```html

<div class="titles_of_posts">

    <div>First Post</div>

    <div>Second Post</div>

    <div>Third Post</div>

</div>

```

Each published WordPress post title is displayed inside a separate `div` element.

### How the foreach loop works

The `foreach` loop processes each object in the `$titles` array one at a time.

During the first iteration, `$title_object` represents the first object.

During the second iteration, `$title_object` represents the second object.

This process continues until all objects in the array have been processed.

For each object, the `post_title` property is accessed and its value is displayed using the `echo` statement.

This functionality will be used to display WordPress post titles inside our Search Form meta box.

## Lesson 09 – Enqueue CSS and JavaScript Files in the WordPress Admin Area

In this lesson, we create the MILUSE_Admin class and learn how to register and enqueue CSS and JavaScript files in the WordPress administration area.

### What we learn

- Create the MILUSE_Admin class and its constructor.

- Use the admin_enqueue_scripts action hook.

- Register class methods as callbacks using add_action() and $this.

- Register a CSS file using wp_register_style().

- Enqueue a registered stylesheet using wp_enqueue_style().

- Understand stylesheet handles, paths, dependencies, versions, and media types.

- Register a JavaScript file using wp_register_script().

- Enqueue JavaScript using wp_enqueue_script().

- Use jQuery as a script dependency.

- Understand the footer-loading argument for JavaScript files.

### PHP code used in Lesson 09

<?php

class MILUSE_Admin {

    public function __construct() {

        add_action( 'admin_enqueue_scripts', [$this, 'enqueue_admin_styles'] );

        add_action( 'admin_enqueue_scripts', [$this, 'enqueue_admin_scripts'] );

    }

    public function enqueue_admin_styles() {

        wp_register_style(

            'miluse-admin-style',

            plugin_dir_url( __FILE__ ) . '../admin/css/admin.css',

            array(),

            '1.0',

            'all'

        );

        wp_enqueue_style( 'miluse-admin-style' );

    }

    public function enqueue_admin_scripts() {

        wp_enqueue_script( 'jquery' );

        wp_register_script(

            'miluse-admin',

            plugin_dir_url( __FILE__ ) . '../admin/js/admin.js',

            array( 'jquery' ),

            '1.0',

            true

        );

        wp_enqueue_script( 'miluse-admin' );

    }

}

### Code explanation

admin_enqueue_scripts

A WordPress action hook used to enqueue assets for admin pages.

wp_register_style() and wp_enqueue_style()

Register the admin stylesheet and add it to the stylesheets WordPress will load.

wp_register_script() and wp_enqueue_script()

Register the admin JavaScript file and add it to the scripts WordPress will load.

array( 'jquery' )

Declares jQuery as a dependency so WordPress loads it before our script.

'all'

Specifies that the CSS stylesheet applies to all media types.

true

Requests that WordPress load the JavaScript file in the footer.

## Lesson 10 – Call a JavaScript Function Using onclick in WordPress

In this lesson, we learn how to call a JavaScript function when a user clicks a WordPress post title in the Search Form meta box.

We use the HTML onclick attribute to call hideTitleFunction() and pass the post title from PHP to JavaScript using the WordPress wp_json_encode() function.

### What we learn
- Understand the HTML onclick event attribute.
- Call a JavaScript function when an HTML element is clicked.
- Define a JavaScript function with a parameter.
- Pass a WordPress post title from PHP to JavaScript.
- Use wp_json_encode() to encode the post title as a JavaScript-compatible value.
- Use alert() to display the clicked post title.
### Code used in Lesson 10
<div onclick='hideTitleFunction(
    <?php echo wp_json_encode( $title_object->post_title ); ?>
);'>
    <?php echo esc_html( $title_object->post_title ); ?>
</div>
function hideTitleFunction(title) {
    alert(title);
}
### Code explanation

onclick

Runs the specified JavaScript code when the user clicks the HTML element.

hideTitleFunction(...)

Calls our JavaScript function and passes the clicked WordPress post title as an argument.

wp_json_encode( $title_object->post_title )

Encodes the PHP post title as a JSON string suitable for passing to JavaScript. The outer HTML attribute uses single quotes; for production code, take care to escape the complete attribute safely when titles contain apostrophes.

function hideTitleFunction(title)

Defines a JavaScript function whose title parameter receives the value passed when the function is called.

alert(title)

Displays the post title in a browser alert dialog.

## Plugin Structure

```text

milun-search-teaching-plugin/

├── milun-search-teaching-plugin.php

├── includes/

│   ├── class-plugin.php

│   └── class-search-form.php

└── README.md

```

## Technologies Used

- PHP

- MySQL

- HTML

- WordPress Plugin API

- WordPress Database API

- Object-Oriented Programming (OOP)

Additional technologies will be introduced as the course progresses.

## Source Code

The source code for each lesson is available in this repository through Git tags.

**Lesson 05:**

[Create Search Form Custom Post Type](https://github.com/milunovicdragan36/milun-search-teaching-plugin/tree/lesson-05-create-search-form-custom-post-type)

**Lesson 06:**

[Create Search Form Meta Box](https://github.com/milunovicdragan36/milun-search-teaching-plugin/releases/tag/lesson-06-creating-search-form-meta-box)

**Lesson 07:**

[Retrieve WordPress Post Titles Using $wpdb](https://github.com/milunovicdragan36/milun-search-teaching-plugin/releases/tag/lesson-07-retrieve-wordpress-post-titles-using-wpdb)

**Lesson 08:**

Display WordPress Post Titles Using a PHP Foreach Loop

Lesson 09:

Enqueue CSS and JavaScript Files in the WordPress Admin Area

Lesson 10:

Call a JavaScript Function Using onclick in WordPress

## Milun Search Plugin

You can also explore the completed Milun Search plugin on TemplateMonster.

[Milun Search – WordPress Search Plugin](https://www.templatemonster.com/wordpress-plugins/milun-search-wordpress-search-plugin-525663.html)

Milun Search provides live search functionality for WordPress websites without requiring a page refresh.

## Course

Follow the **Milun Media** YouTube channel for step-by-step WordPress and WooCommerce plugin development tutorials.

## License

GPL-2.0-o