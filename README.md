# Laravel - Pyntax API Helper

This library is used to automate the processing of creating REST resource with the following verbs

- GET
- POST
- PUT
- DELETE

This library will create the following routes.

- GET /api/{resource}
- GET /api/{resource}/{id}
- POST /api/{resource}
- PUT /api/{resource}/{id}
- DELETE /api/{resource}/{id}

The library will use Eloquent models out of the box to create the above functionality. We wan also turn on the cache,
which can make the delivering the resource a lot faster.

# Installation
 1. run `composer require "pyntax/laravel-pyntax-rest-api-helper":"dev-master"`
 2. Add `\Pyntax\Providers\PyntaxApiServiceProvider::class` to config/app.php under "providers" key.
 3. run `php artisan:vendor publish`
 4. By default the API route for users is configured. 
 5. Add your more of your routes and happy coding.

# License
The Pyntax API Helper is open-sourced software licensed under the MIT license.