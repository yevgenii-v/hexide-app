# Getting started

## Installation

Clone the repository

    git clone https://github.com/yevgenii-v/hexide-app.git

Switch to the repo folder

    cd hexide-app

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

Install & run npm
    
    npm install
    npm run dev 

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/yevgenii-v/hexide-app.git
    cd hexide-app
    composer install
    cp .env.example .env
    php artisan key:generate
    npm install
    npm run dev 

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

Run the database seeder and you're done

    php artisan db:seed

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api

Request headers

| **Required** 	| **Key**              	 | **Value**         |
|----------	|------------------------|--------------------|
| Yes      	| Content-Type     	     | application/json 	 |
| Yes      	| Accept 	             | application/json 	 |
