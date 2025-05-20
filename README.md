# AJAX City Selector Demo

A simple web application demonstrating AJAX functionality to dynamically load city options based on state selection without page refresh.

## Overview

This project shows how to implement asynchronous data loading using vanilla JavaScript and PHP. When a user selects a state from the dropdown menu, the application makes an AJAX request to the server, which returns a list of cities for that state. The city dropdown is then dynamically updated without refreshing the page.

## Features

- Dynamic loading of city data based on state selection
- No page refresh required when selecting different states
- Cross-browser compatibility with fallbacks for older browsers
- SQL injection protection with proper input escaping
- Clean separation of HTML, JavaScript, and PHP components

## Technologies Used

- HTML5
- JavaScript (Vanilla JS)
- PHP
- MySQL
- AJAX (Asynchronous JavaScript and XML)

## Project Structure

- `index.html` - Main HTML page with state selection dropdown
- `cities.js` - JavaScript file containing AJAX functionality
- `getcities.php` - PHP server-side script that queries the database and returns city data
- `database_ddl.txt` - SQL commands to create and populate the demo database

## Database Setup

1. Create a database named `ajax_demo`
2. Execute the SQL commands in `database_ddl.txt` to create and populate the tables

```sql
create database ajax_demo;

use ajax_demo;
create table states (id int primary key auto_increment, name varchar(100));

insert into states (name) values ('Alabama');
insert into states (name) values ('Colorado');
insert into states (name) values ('Alaska');

create table cities (id int primary key auto_increment, state_name varchar(100), city_name varchar(100));

insert into cities (state_name, city_name) values ('Alabama', 'Florence');
insert into cities (state_name, city_name) values ('Alabama', 'Gulf Shores');
insert into cities (state_name, city_name) values ('Colorado', 'Golden');
insert into cities (state_name, city_name) values ('Colorado', 'Pagosa Springs');
insert into cities (state_name, city_name) values ('Colorado', 'Rifle');
insert into cities (state_name, city_name) values ('Alabama', 'Paint Rock');
insert into cities (state_name, city_name) values ('Alaska', 'Homer');
```

## Installation and Setup

1. Clone this repository to your web server directory
2. Import the database structure using the SQL in `database_ddl.txt`
3. Update database connection details in `getcities.php` if needed
4. Access the application through your web server (e.g., http://localhost/ajax-demo/)

## How It Works

1. The user selects a state from the dropdown in `index.html`
2. The `onchange` event triggers the `getCitiesByState()` function in `cities.js`
3. An XMLHttpRequest is sent to `getcities.php` with the selected state as a parameter
4. The PHP script queries the database for cities in the selected state
5. A formatted HTML select element is returned to the JavaScript callback
6. The callback updates the `cityList` span with the new dropdown

## Security Considerations

- SQL injection protection using `mysqli_real_escape_string()`
- XSS protection with `htmlspecialchars()` when outputting data
- Input validation on both client and server sides

## Browser Compatibility

The application includes fallback code for older browsers that use ActiveXObject instead of XMLHttpRequest. This ensures compatibility with most browsers, including older versions of Internet Explorer.

## Future Enhancements

- Add form submission functionality
- Implement client-side caching of results
- Add error handling for network issues
- Create an API version using JSON responses
