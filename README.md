
----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Clone the repository

    git clone git@github.com:BhavikTrambadiya/vuelaravel.git

Switch to the repo folder

    cd vuelaravel

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env


Install all the dependencies using npm

    npm install


# Please add APP_URL correct to call api routes

    APP_URL=http://vuelaravel.test

Generate a new application key

    php artisan key:generate

Setup Passport 

[passport](https://laravel.com/docs/9.x/passport) set up passport accoding to this url

    php artisan passport:keys
    php artisan passport:client --personal
    

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeder and you're done

    php artisan db:seed
    
Compile all the dependencies using npm

    npm run dev

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

# OR

Use Laragon or other tools 

    http://vuelaravel.test


The api can be accessed at [http://localhost:8000/api/v1](http://localhost:8000/api/v1).

# Code overview

## Dependencies

- [passport](https://laravel.com/docs/9.x/passport) - For authentication using JSON Web Tokens
- [laravel-ui](https://github.com/laravel/ui) - For Vue and Boostrap setup

## Folders

- `app` - Contains all the Eloquent models
- `app/Enums` - Contains all the php 8.1 enums
- `app/Http/Controllers/Api` - Contains all the api controllers
- `app/Http/Controllers/Admin` - Contains all the admin controllers
- `app/Http/Middleware/AceessTokenIsvalid` - Contains the token auth middleware
- `app/Http/Requests/Api` - Contains all the api form requests
- `app/Http/Resource` - Contains all the api form resource
- `app/Http/Traits` - Contains all the traits
- `app/Providers` - Contains some changes with blade derivatives and boostrap pagination
- `app/Services` - Contains all service accoding to project need
- `app/View` - Contains the laravel Components
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `resources/view` - Contains the blade view
- `resources/js` - Contains the Vue project and other scripts
- `resources/scss` - Contains the Boostrap css
- `routes` - Contains all the api routes defined in api.php file
