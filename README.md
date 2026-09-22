# Milun Search – Learn WordPress Plugin Development by Building a Live Search Plugin

**Author:** Dragan Milunovic

**Tags:** WordPress, plugin development, search, live search, PHP, Object-Oriented PHP, OOP, MySQL, JavaScript, Object-Oriented JavaScript, ES6, jQuery, AJAX, REST API, HTML, CSS, shortcode, custom post type

**License:** GPLv2 or later

## About the Project

Milun Search is a simplified WordPress live search plugin created specifically for teaching WordPress plugin development.

The purpose of this project is not only to create a working search plugin, but also to demonstrate how the main parts of a WordPress plugin work together in a real project.

Students will build the plugin step by step from the beginning and learn how Object-Oriented PHP, MySQL, Object-Oriented JavaScript, ES6, jQuery, AJAX, the WordPress REST API, HTML, and CSS work together inside a WordPress plugin.

The complete source code in this repository represents the finished version of the project that will be built throughout the lessons.

## What You Will Learn

By following this project, you will learn how to:

* Create the basic structure of a WordPress plugin

* Organize plugin code using Object-Oriented PHP (OOP)

* Work with PHP classes, properties, constructors, and methods

* Register a custom post type

* Create a custom Search Form in the WordPress admin area

* Create a custom meta box for the Search Form

* Load CSS and JavaScript files correctly

* Work with WordPress post metadata

* Save settings using AJAX

* Work with MySQL queries

* Include and exclude posts from search results

* Create and use WordPress shortcodes

* Display a custom search form on the front end

* Create HTML elements for the search form and search results

* Connect HTML search elements with JavaScript and jQuery

* Organize live search functionality using Object-Oriented JavaScript

* Work with JavaScript classes, constructors, methods, and objects

* Use modern JavaScript (ES6) features

* Detect when a user types in the search field

* Create custom WordPress REST API routes

* Retrieve matching posts from the MySQL database

* Return search results through a custom WordPress REST API route

* Process REST API search results with JavaScript and jQuery

* Display returned search results dynamically in HTML

* Display a message when no matching posts are found

* Clean up plugin data during plugin uninstallation

## Technologies Used

* PHP

* Object-Oriented PHP (OOP)

* WordPress

* MySQL

* JavaScript

* Object-Oriented JavaScript (OOP)

* ES6 (Modern JavaScript)

* jQuery

* AJAX

* WordPress REST API

* HTML

* CSS

## Educational Version

This repository contains a simplified teaching version of Milun Search.

Some parts of the original Milun Search plugin have been intentionally simplified so that the code is easier to read, explain, and understand during the lessons.

The focus of this project is learning WordPress plugin development through practical implementation.

Instead of working with isolated code examples, students will see how different WordPress development concepts are combined to create a complete working plugin.

## How the Lessons Work

The repository contains the complete version of the teaching plugin.

During the lessons, we will start from the beginning and build the plugin step by step.

Each lesson will introduce a new part of the plugin, explain its purpose, and demonstrate how it connects with the other parts of the project.

For example, students will see how Object-Oriented PHP is used to organize the plugin functionality, how MySQL is used to retrieve matching posts, how a custom REST API route returns the results to the front end, and how Object-Oriented JavaScript, ES6, and jQuery process and display those results dynamically in HTML.

Students can use this repository as a reference and compare their code with the completed project.

## Installation

1. Download or clone this repository.

2. Copy the plugin folder to `/wp-content/plugins/`.

3. Open the WordPress admin dashboard.

4. Go to **Plugins**.

5. Activate **Milun Search**.

6. Open **Search Form** from the WordPress admin menu.

7. Configure the search settings.

8. Add the Milun Search shortcode to a page or post.

9. Open the page and start searching.

## How the Search Works

Milun Search connects several WordPress development concepts to create live search functionality.

When a user types into the search field:

1. JavaScript and jQuery detect the user's input.

2. A request is sent to a custom WordPress REST API route.

3. The REST API callback uses PHP and MySQL to retrieve matching posts from the database.

4. The matching post data is returned through the REST API.

5. JavaScript and jQuery process the returned data.

6. The search results are displayed dynamically in HTML.

7. The page does not need to reload while the user searches.

This gives students a practical example of the complete search flow:

**Search Input → JavaScript/jQuery → REST API → PHP/MySQL → REST API Response → HTML Search Results**

## Who Is This Project For?

This project is intended for students who have a basic understanding of PHP, HTML, CSS, and JavaScript and want to learn how WordPress plugins are developed.

It is especially useful for developers who want practical experience with:

* WordPress plugin architecture

* Object-Oriented PHP (OOP)

* PHP classes, properties, constructors, and methods

* Custom post types

* Meta boxes

* Post metadata

* MySQL

* Shortcodes

* HTML search interfaces

* Object-Oriented JavaScript (OOP)

* ES6 (Modern JavaScript)

* JavaScript classes, constructors, and methods

* jQuery

* AJAX

* WordPress REST API

* Dynamic HTML content

* Live search functionality

Advanced WordPress plugin development knowledge is not required.

## Project Goal

By the end of the project, students will have built a working WordPress live search plugin and gained practical experience with several important concepts used in WordPress plugin development.

The goal is to understand not only **what code to write**, but also **how the different parts of a WordPress plugin work together**.

Students will see the complete flow from organizing plugin functionality with Object-Oriented PHP, retrieving matching posts from the MySQL database, returning the data through a custom WordPress REST API route, processing the response with Object-Oriented JavaScript, ES6, and jQuery, and displaying the final search results dynamically in HTML.

## Author

**Dragan Milunovic**

WordPress & WooCommerce Plugin Developer

## License

Milun Search is licensed under the **GPLv2 or later** license.
