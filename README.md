
# Quotely - Laravel API

This repository stores a backend API service that complements Quotely application.

![quotelyLogo](https://user-images.githubusercontent.com/117080861/225559955-2b0d2933-bf7b-496d-b742-866bc79e64bb.png)

## What is Quotely? 

Annotating quotes is a way to extend the pleasure of reading. So, we share passages from our books with other people or revisit your pages in the future with little effort.

Quotely allows you to always have your notable quotes at hand. Can classify by genre and author, as well as share with others.


## Database

The database for Quotely was designed as shows the following entity relationship diagram:

![quotelyERD](https://user-images.githubusercontent.com/117080861/225568274-82f7f54e-44ce-4295-b82e-e361e4269561.png)


## Endpoints
The principal endpoints of this API returns all the data available on the quotes in the database. For example:
*  GET /api/quotes (returns all quotes)

    This is an example response:
    
    ![quotelyEndpoint1](https://user-images.githubusercontent.com/117080861/225566295-7aacb304-1703-40ec-a344-4784a6b13909.png)

* POST /api/quote (store a new quote)
* GET /api/quote/{id} (show a single quote by id)

    This is an example Json response:
    
    ![quotelyEndpoint2](https://user-images.githubusercontent.com/117080861/225567042-625e64f5-f1d9-4548-85dc-cd578d894523.png)

* PUT /api/quote/{id} (update an existing quote)
* DELETE /api/quote/{id} (delete an existing quote)

There are other endpoints, designed to manage data just for each one of these tables: Books, Author and Genre. They are complementary to the essential functions of Quotely app.

## Technologies 

* Laravel
* MySQL

### You could consider to use:
* XAMPP- to run the application locally.
* Postman- to see the endpoint response.

## Installation
Once you have cloned this Github repo, you must follow these steps to run the application:

* Install dependencies with:
    `composer install`
    `npm install`
* Create a MySQL database (you could use PHPMyAdmin or the command line to do that)
* Create the .env file (as reference, you could use "env.example" in project root)
* Migrate the database with:
    `php artisan migrate`
    `php artisan migrate:fresh`
    (this command is to update changes to previous migrations)
    `php artisan migrate:fresh --seed`
    (the last command is for update previous migrations and seed the daatbae with 10 records usign random data)


