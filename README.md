# Milun Search – WordPress Plugin Development Course

Learn WordPress plugin development by building a live search plugin step by step.

## Lesson 05 – Create the Search Form Custom Post Type

In this lesson, we continue developing the `MILUSE_Search_Form` class and create the Search Form custom post type for the Milun Search plugin.

We register the custom post type with WordPress and configure how it behaves inside the WordPress admin area.

## What We Build in This Lesson

In Lesson 05, we:

- Register the Search Form custom post type
- Use the WordPress `init` action hook
- Use the `register_post_type()` function
- Set the custom post type label
- Keep the custom post type private on the frontend
- Display the custom post type in the WordPress admin area
- Prevent users from creating additional Search Form posts
- Use WordPress meta capability mapping
- Prepare the Search Form meta box functionality for a later lesson

## Plugin Structure

The plugin structure remains:

```text
milun-search-teaching-plugin/
│
├── milun-search-teaching-plugin.php
│
└── includes/
    ├── class-plugin.php
    └── class-search-form.php
```

In this lesson, we mainly work inside:

`includes/class-search-form.php`

## Registering the Search Form Custom Post Type

Inside the `MILUSE_Search_Form` constructor, we use the WordPress `init` action hook:

```php
add_action( 'init', array( $this, 'register_post_type' ) );
```

This tells WordPress to call the `register_post_type()` method during the `init` action.

The `register_post_type()` method then registers our Search Form custom post type:

```php
register_post_type(
    'miluse_search_post',
    array(
        'label' => __( 'Search Form', 'milun-search' ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => false,
        'capabilities' => array(
            'create_posts' => 'do_not_allow',
        ),
        'map_meta_cap' => true
    )
);
```

The custom post type name is:

```text
miluse_search_post
```

Its label in the WordPress admin area is:

```text
Search Form
```

## Custom Post Type Configuration

We use several arguments to control how the Search Form custom post type behaves.

### `label`

```php
'label' => __( 'Search Form', 'milun-search' ),
```

Sets the label displayed for the custom post type.

The `__()` function makes the text ready for WordPress translation.

### `public`

```php
'public' => false,
```

The Search Form is not intended to behave like normal public website content.

It is used internally by the plugin to manage the Search Form configuration.

### `show_ui`

```php
'show_ui' => true,
```

Enables the WordPress admin interface for the custom post type.

This allows us to manage the Search Form from the WordPress dashboard.

### `show_in_menu`

```php
'show_in_menu' => true,
```

Displays the custom post type in the WordPress admin menu.

### `supports`

```php
'supports' => false,
```

Disables the standard WordPress post editor features for this custom post type.

We do not need the normal post editing fields because the Search Form will use its own custom functionality.

### `capabilities`

```php
'capabilities' => array(
    'create_posts' => 'do_not_allow',
),
```

Prevents users from manually creating additional Search Form posts through the standard WordPress interface.

This is useful because the plugin is designed to control the Search Form rather than allow users to create multiple standard posts of this type.

### `map_meta_cap`

```php
'map_meta_cap' => true
```

Enables WordPress meta capability mapping for the custom post type.

WordPress can map operations on individual posts to the appropriate primitive capabilities for the current user.

## Preparing the Meta Box

We also register the `add_meta_boxes` action:

```php
add_action( 'add_meta_boxes', array( $this, 'miluse_add_meta_boxes' ) );
```

The `miluse_add_meta_boxes()` method currently exists as an empty method:

```php
public function miluse_add_meta_boxes() {

}
```

The method is prepared now so that the Search Form meta box functionality can be implemented in a later lesson.

## Why Use a Custom Post Type?

The Search Form needs its own structure inside WordPress.

Using a custom post type gives the plugin a dedicated content type that can later store and manage Search Form configuration.

This provides a foundation for adding custom meta boxes, search settings, and other functionality as we continue developing the plugin.

## What's Next?

In the next lessons, we will continue developing the `MILUSE_Search_Form` class and add more functionality to the Search Form inside the WordPress admin area.

## Course

**Learn WordPress Plugin Development by Building a Live Search Plugin**

The Milun Search plugin is developed progressively throughout the course.

The `main` branch contains the completed version of the plugin.

The `lessons` branch contains the course version that is built step by step.

## Lesson 05 Source Code

GitHub tag:

`lesson-05-create-search-form-custom-post-type`

Source code:

https://github.com/milunovicdragan36/milun-search-teaching-plugin/tree/lesson-05-create-search-form-custom-post-type