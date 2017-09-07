# Laravel - Pyntax API Helper

This library is used to automate the processing of creating REST resource with the following verbs

- GET
- POST
- PUT
- DELETE

This library will create the following routes.

- GET /{resource}
- GET /{resource}/{id}
- POST /{resource}
- PUT /{resource}/{id}
- DELETE /{resource}/{id}

The library will use Eloquent models out of the box to create the above functionality. We wan also turn on the cache,
which can make the delivering the resource a lot faster.
