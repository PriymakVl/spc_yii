<?php

 return [
        'category' => [
            'class' => 'app\modules\category\CategoryModule',
             'defaultRoute' => 'category'
        ],

        'product' => [
            'class' => 'app\modules\product\ProductModule',
            'defaultRoute' => 'product'//name controller
        ],

        'admin' => [
            'class' => 'app\modules\admin\AdminModule',
            'defaultRoute' => 'admin/login'
        ],
    ];