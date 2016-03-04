<?php
Pyntax\Config\Config::write('rest_config', array(
    /**
     * Primary key for every Bean
     */
    'primary_key' => 'id',

    /**
     *
     */
    'user_table_name' => 'users',

    /**
     *
     */
    'user_foreign_key' => 'users_id',

    /**
     *
     */
    'is_every_bean_owned_by_user' => true,

    /**
     *
     */
    'api_return_type' => 'Pyntax\Api\Response\JsonRestApiResponse',

    /**
     *
     */
    'resource_relationship' => array(

    )
));