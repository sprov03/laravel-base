<?php

return [
    /**
     * This is the default template set that is used
     */
    'default' => [
        'templates' => [
            [
                'name' => 'model',
                'path' => "app/Models/[[namespace_path]]/[[ModelName]].php"
            ],
            [
                'name' => 'model_test',
                'path' => "tests/app/[[namespace_path]]/[[ModelName]]Test.php"
            ],
            [
                'name' => 'model_controller',
                'path' => "app/Http/Controllers/[[ModelName]]Controller.php"
            ],
            [
                'name' => 'model_controller_test',
                'path' => "tests/app/Http/Controllers/[[ModelName]]ControllerTest.php"
            ],
            [
                'name' => 'model_factory',
                'path' => "database/factories/[[namespace_path]]/[[ModelName]]Factory.php"
            ],
            [
                'name' => 'model_seeder',
                'path' => "database/seeds/[[ModelName]]Seeder.php"
            ],
        ],
        'inline_templates' => [
            [
                'name' => 'route_resource',
                'identifier' => '/** Routes File Marker: Do Not Remove Being Used Buy Code Generator */',
                'path' => 'app/Http/routes.php'
            ]
        ],

        /**
         * highest Priority options can only be overwritten form the command
         *      line using the --other-variables option
         */
        'options' => [
            'namespace_path' => 'General',
            'namespace' => 'General'
        ],
    ],

    /**
     * This is a simple example of a template that you can create
     */
    'admin' => [
        'templates' => [
        ],
        'inline_templates' => [
        ],

        /**
         * highest Priority options can only be overwritten form the command
         *      line using the --other-variables option
         */
        'options' => [
            'namespace_path' => 'Admin',
            'namespace' => 'Admin'
        ],
    ],

    /**
     * Global Setting You can over wright these in specific template options or
     *      by passing others in thew the commandline
     */
    'options' => [
        'namespace_path' => 'Models',
        'namespace' => 'Models',
        'fully_qualified_base_model_name' => 'App\BaseModel',
        'base_model' => 'BaseModel'
    ]
];
