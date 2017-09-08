<?php

return [
    'useCache' => false,

    'activeResources' => [

        // ... this is where we list all the resources which can be rendered using the API Helper.

        'users' => [
            'model' => \App\User::class,
            'service' => null,
            'repository' => null,
            'isAuthProtected' => false,
            // 'policyName' => 'authPolicy'
        ],


    ],

    'policies' => [
//        'authPolicy' => [
//
//        ]
        'authProtectedForeignKey' => 'users_id'
    ]
];