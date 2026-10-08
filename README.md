# Milun Search – WordPress Plugin Development Course

Learn WordPress plugin development by building a live search plugin step by step.

## Lesson 06 – Creating the Search Form Meta Box

In this lesson, we continue developing the `MILUSE_Search_Form` class and create a custom meta box for the Search Form custom post type.

We use the WordPress `add_meta_boxes` action hook and the `add_meta_box()` function to display a custom meta box inside the WordPress admin area.

We also create a callback method that displays instructions inside the meta box.

## What We Build in This Lesson

In Lesson 06, we:

- Use the WordPress `add_meta_boxes` action hook
- Create the `miluse_add_meta_boxes()` method
- Register a custom meta box using `add_meta_box()`
- Define the meta box ID and title
- Connect the meta box to the Search Form custom post type
- Use an object method as the meta box callback
- Create the `miluse_search_visibility()` callback method
- Display translated and escaped text using `esc_html_e()`
- Prepare the meta box for future post-exclusion functionality

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

In this lesson, we work inside:

`includes/class-search-form.php`

## Registering the Meta Box Action Hook

Inside the `MILUSE_Search_Form` constructor, we add the WordPress `add_meta_boxes` action hook:

```php
add_action(
    'add_meta_boxes',
    array( $this, 'miluse_add_meta_boxes' )
);
```

This tells WordPress to call the `miluse_add_meta_boxes()` method when WordPress registers meta boxes.

The `$this` keyword refers to the current object of the `MILUSE_Search_Form` class.

## Creating the Search Form Meta Box

We create the following method inside the `MILUSE_Search_Form` class:

```php
/**
 * Add the Search Form meta box.
 */
public function miluse_add_meta_boxes() {

    add_meta_box(
        'miluse_posts_titles',
        __( 'Search Form', 'milun-search' ),
        array( $this, 'miluse_search_visibility' ),
        'miluse_search_post',
        'normal',
        'default'
    );
}
```

The `add_meta_box()` function registers a custom meta box in the WordPress admin area.

### Understanding the add_meta_box() Arguments

**1. Meta Box ID**

```php
'miluse_posts_titles'
```

This is the unique identifier of our meta box.

**2. Meta Box Title**

```php
__( 'Search Form', 'milun-search' )
```

Defines the title displayed at the top of the meta box.

The `__()` function makes the text available for WordPress translation.

**3. Callback Method**

```php
array( $this, 'miluse_search_visibility' )
```

Specifies the method responsible for displaying the content inside the meta box.

**4. Custom Post Type**

```php
'miluse_search_post'
```

Specifies the custom post type where the meta box will appear.

This is the Search Form custom post type created in Lesson 05.

**5. Meta Box Context**

```php
'normal'
```

Specifies the area where the meta box is displayed.

Common context values include:

- `normal` – Main content area
- `side` – Sidebar area
- `advanced` – Advanced meta box area

**6. Meta Box Priority**

```php
'default'
```

Specifies the priority of the meta box within its context.

Common priority values include:

- `high`
- `core`
- `default`
- `low`

Priority influences the initial ordering of meta boxes within the same context.

## Creating the Meta Box Callback Method

Next, we create the callback method responsible for displaying content inside our meta box.

```php
/**
 * Display the Search Form meta box content.
 *
 * @param WP_Post $post Current post object.
 */
public function miluse_search_visibility( $post ) {

    esc_html_e(
        'Click on the post title you want to exclude.',
        'milun-search'
    );
}
```

WordPress automatically passes the current post object to the callback method.

The `$post` parameter represents the current Search Form post being edited.

Although we do not use `$post` in this lesson, it will be useful when we implement additional functionality.

### Understanding esc_html_e()

```php
esc_html_e(
    'Click on the post title you want to exclude.',
    'milun-search'
);
```

The `esc_html_e()` function translates, escapes, and immediately displays text.

It helps ensure that translated text is safely displayed as HTML content.

The first argument is the text we want to display.

The second argument, `milun-search`, is the plugin's text domain.

## Why Use a Meta Box?

A meta box allows us to add custom functionality to the WordPress post editing interface.

In the Milun Search plugin, the Search Form meta box will eventually allow users to control which posts are included or excluded from search results.

In this lesson, we create only the basic meta box structure and display an instructional message.

The post-selection and exclusion functionality will be implemented in later lessons.

## What's Next?

In the next lessons, we will continue developing the Search Form meta box.

We will work toward displaying WordPress post titles inside the meta box and allowing users to select which posts should be excluded from live search results.

## Course

**Learn WordPress Plugin Development by Building a Live Search Plugin**

The Milun Search plugin is developed progressively throughout the course.

The `main` branch contains the completed version of the plugin.

The `lessons` branch contains the course version that is built step by step.

## Lesson 06 Source Code

**GitHub tag:**

`lesson-06`

**Source code:**

https://github.com/milunovicdragan36/milun-search-teaching-plugin/tree/lesson-06