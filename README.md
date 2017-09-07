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

# License
The Pyntax API Helper is open-sourced software licensed under the MIT license.