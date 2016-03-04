<?php
\Pyntax\Config\Config::write('html', array(
    /**
     * @property: \Pyntax\Html\HtmlFactory::FileTypeOption_CSS | css
     * This property is used to set files which will be auto loaded when printCSSFiles is used.
     */
    \Pyntax\Html\HtmlFactory::FileTypeOption_CSS => array(
        \Pyntax\Html\HtmlFactory::FilePlacementOption_Header => array(
            '/third-party/AdminLTE-2.3.0/bootstrap/css/bootstrap.min.css',
            'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
            'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
            '/third-party/AdminLTE-2.3.0/dist/css/AdminLTE.min.css',
            '/third-party/AdminLTE-2.3.0/dist/css/skins/_all-skins.min.css',

            '/pyntaxjs/lib/pickadatejs/lib/themes/default.css',
            '/pyntaxjs/lib/pickadatejs/lib/themes/default.date.css',
            '/pyntaxjs/lib/pickadatejs/lib/themes/default.time.css'
        )
    ),
    /**
     * @property: \Pyntax\Html\HtmlFactory::FileTypeOption_JS | js
     * This property is used to set files which will be auto loaded when printJSFiles is used.
     */
    \Pyntax\Html\HtmlFactory::FileTypeOption_JS => array(
        \Pyntax\Html\HtmlFactory::FilePlacementOption_Header => array(
            '/pyntaxjs/lib/jquery/jquery.min.js',

            //    '/pyntaxjs/lib/backbone/backbone.min.js',
            //    '/pyntaxjs/lib/backbone/underscore.min.js',
            //    '/pyntaxjs/lib/handlebars/handlebars.js',

            '/pyntaxjs/lib/pickadatejs/lib/legacy.js',
            '/pyntaxjs/lib/pickadatejs/lib/picker.js',
            '/pyntaxjs/lib/pickadatejs/lib/picker.date.js',
            '/pyntaxjs/lib/pickadatejs/lib/picker.time.js',

            '/pyntaxjs/src/app.js',
            '/pyntaxjs/src/core/form/form.js'
        )
    )
));