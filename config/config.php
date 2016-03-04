<?php
Pyntax\Config\Config::write('core',array(
    'MySQLAdapter' => 'Pyntax\DAO\Adapter\MySqlAdapter'
));

Pyntax\Config\Config::write('database', array(
    'server' => 'localhost',
    'user' => 'root',
    'password' => '',
    'database' => 'simplemanager_db_v3'
));

Pyntax\Config\Config::write('template', array(
    'html_element_template' => "<{{elTag}} {% for attribute in attributes %}{{attribute.name}}='{{attribute.value}}'{% endfor %} {% if( elTagClosable == true) %}> {{elDataValue|raw}} </{{elTag}}>{% else %}value='{{elDataValue}}' />{% endif %}",
));

\Pyntax\Config\Config::write('cache', array(
    'adapter' => 'filesystem',
    'cacheDir' => 'tmp/cache'
));