<?php
\Pyntax\Config\Config::write('cache', array(
    'adapter' => 'filesystem',
    'cacheDir' => dirname(dirname(__FILE__)."../")."/tmp/cache"
));