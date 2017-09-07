<?php

return [
    'use_cache' => false,

    'active_resources' => [

        // ... this is where we list all the resources which can be rendered using the API Helper.

        'users' => [
            'model' => \App\User::class,
            'service' => null,
            'repository' => null
        ]
    ]
];