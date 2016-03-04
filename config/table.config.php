<?php
Pyntax\Config\Config::write('table', array(
    /**
     * @property: recordLimitOnOnePage
     * This stores the number for records which are displayed on each.
     * @ToDo: This would be implemented as the size of the Pagination
     */
    'recordLimitOnOnePage' => 10,

    /**
     * @property: table
     * This stores all the default attributes for the table tag.
     * @ToDo: There can attributes which can be passed while calling generateTable
     */
    'table' => array(
        'class' => 'table table-bordered table-hover',
        'id' => 'example2'
    ),

    /**
     * @property: tableHeader
     * This stores a boolean value whether the table header has to be printed or not.
     */
    'tableHeader' => true,

    /**
     * @property: beans
     * This array key is used to override any configuration based on the bean we are loading.
     */
    'beans' => array(
        'accounts' => array(
            'recordLimitOnOnePage' => 15,
        )
    )
));
