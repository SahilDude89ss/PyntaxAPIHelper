<?php
Pyntax\Config\Config::write('rest_config', array(
    /**
     * Primary key for every Bean
     */
    'primary_key' => 'id',

    /**
     *
     */
    'is_every_bean_owned_by_user' => true,

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
    'api_return_type' => 'Pyntax\Api\Response\JsonRestApiResponse',

    /**
     * before_save LogicHook
     */
    'before_save' => function($bean, $callback) {
        call_user_func($callback, array($bean));
    }
));