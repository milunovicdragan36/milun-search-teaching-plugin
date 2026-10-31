# Milun Search – Learn WordPress Plugin Development by Building a Live Search Plugin

This repository contains the source code for the YouTube course **Learn WordPress Plugin Development by Building a Live Search Plugin**.

In this course, we build a custom WordPress live search plugin step by step using PHP, MySQL, JavaScript, jQuery, AJAX, the WordPress REST API, HTML, and CSS.

Each lesson introduces new functionality and explains important WordPress plugin development concepts.

## Previous Lessons – Source Code

**Lesson 04 – Create Plugin Header and Main Plugin Classes**  
[Browse the course repository](https://github.com/milunovicdragan36/milun-search-teaching-plugin)

**Lesson 05 – Create Search Form Custom Post Type**  
[View Lesson 05 on GitHub](https://github.com/milunovicdragan36/milun-search-teaching-plugin/tree/lesson-05-create-search-form-custom-post-type)

**Lesson 06 – Create Search Form Meta Box**  
[View Lesson 06 on GitHub](https://github.com/milunovicdragan36/milun-search-teaching-plugin/releases/tag/lesson-06-creating-search-form-meta-box)

**Lesson 07 – Retrieve WordPress Post Titles Using $wpdb**  
[View Lesson 07 on GitHub](https://github.com/milunovicdragan36/milun-search-teaching-plugin/releases/tag/lesson-07-retrieve-wordpress-post-titles-using-wpdb)

**Lesson 08 – Display WordPress Post Titles Using a PHP Foreach Loop**  
[View Lesson 08 on GitHub](https://github.com/milunovicdragan36/milun-search-teaching-plugin/tree/lesson-08-display-wordpress-post-titles-using-foreach)

**Lesson 09 – Enqueue CSS and JavaScript Files in the WordPress Admin Area**  
[View Lesson 09 on GitHub](https://github.com/milunovicdragan36/milun-search-teaching-plugin/tree/lesson-09-enqueue-admin-css-and-javascript)

**Lesson 10 – Call a JavaScript Function Using onclick in WordPress**  
[View Lesson 10 on GitHub](https://github.com/milunovicdragan36/milun-search-teaching-plugin/tree/lesson-10-call-javascript-function-using-onclick)

In this lesson, we learn how to call a JavaScript function when a user clicks a WordPress post title in the Search Form meta box.

We use the HTML `onclick` attribute to call `hideTitleFunction()` and pass the post title from PHP to JavaScript using the WordPress `wp_json_encode()` function.

### What we learn

- Understand the HTML `onclick` event attribute.
- Call a JavaScript function when an HTML element is clicked.
- Define a JavaScript function with a parameter.
- Pass a WordPress post title from PHP to JavaScript.
- Use `wp_json_encode()` to encode the post title as a JavaScript-compatible value.
- Use `alert()` to display the clicked post title.

### Code used in Lesson 10

```php
<div onclick='hideTitleFunction(
    <?php echo wp_json_encode( $title_object->post_title ); ?>
);'>
    <?php echo esc_html( $title_object->post_title ); ?>
</div>
```

```javascript
function hideTitleFunction(title) {
    alert(title);
}
```

### Code explanation

**`onclick`**

Runs the specified JavaScript code when the user clicks the HTML element.

**`hideTitleFunction(...)`**

Calls our JavaScript function and passes the clicked WordPress post title as an argument.

**`wp_json_encode( $title_object->post_title )`**

Encodes the PHP post title as a JSON string suitable for passing to JavaScript. The outer HTML attribute uses single quotes; for production code, take care to escape the complete attribute safely when titles contain apostrophes.

**`function hideTitleFunction(title)`**

Defines a JavaScript function whose `title` parameter receives the value passed when the function is called.

**`alert(title)`**

Displays the post title in a browser alert dialog.

## Technologies Used

PHP · MySQL · HTML · CSS · JavaScript · jQuery · AJAX · WordPress REST API · WordPress Plugin API · WordPress Database API · Object-Oriented Programming (OOP)

## Milun Search Plugin

You can also explore the completed [Milun Search – WordPress Search Plugin on TemplateMonster](https://www.templatemonster.com/wordpress-plugins/milun-search-wordpress-search-plugin-525663.html).

Milun Search provides live search functionality for WordPress websites without requiring a page refresh.

## Course

Follow the **Milun Media** YouTube channel for step-by-step WordPress and WooCommerce plugin development tutorials.

## License

GPL-2.0-or-later
