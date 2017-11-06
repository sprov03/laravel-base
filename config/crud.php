<?php
/**
 *      Example of template variables available
 *
        [
            "table_name" => "products",
            "model_name" => "Product",
            "model_name_snake_case" => "product",
            "model_name_kebab_case" => "product",
            "model_name_studly_case" => "Product",
            "model_name_camel_case" => "product",
            "model_name_snake_case_singular" => "product",
            "model_name_kebab_case_singular" => "product",
            "model_name_studly_case_singular" => "Product",
            "model_name_camel_case_singular" => "product",
            "model_name_snake_case_plural" => "products",
            "model_name_kebab_case_plural" => "products",
            "model_name_studly_case_plural" => "Products",
            "model_name_camel_case_plural" => "products",
            "app_namespace" => "Testing\\Dogs\\Again",
            "columns" => [
                {
                    "Field": "id",
                    "Type": "int(10) unsigned",
                    "Null": "NO",
                    "Key": "PRI",
                    "Default": null,
                    "Extra": "auto_increment",
                    "name": "id",
                    "display": "Id",
                    "type": "number",
                    "document_type": "integer"
                },
                {
                    "Field": "asin",
                    "Type": "varchar(191)",
                    "Null": "NO",
                    "Key": "UNI",
                    "Default": null,
                    "Extra": "",
                    "name": "asin",
                    "display": "Asin",
                    "document_type": "string",
                    "type": "text",
                    "rules": "required|max:191|unique:products,asin"
                },
                {
                    "Field": "purchasable_id",
                    "Type": "int(10) unsigned",
                    "Null": "NO",
                    "Key": "MUL",
                    "Default": null,
                    "Extra": "",
                    "name": "purchasable_id",
                    "display": "Purchasable id",
                    "document_type": "integer",
                    "type": "number",
                    "rules": "required|integer"
                },
                {
                    "Field": "purchasable_type",
                    "Type": "varchar(50)",
                    "Null": "NO",
                    "Key": "MUL",
                    "Default": null,
                    "Extra": "",
                    "name": "purchasable_type",
                    "display": "Purchasable type",
                    "document_type": "string",
                    "type": "text",
                    "rules": "required|max:50"
                },
                {
                    "Field": "user_id",
                    "Type": "int(10) unsigned",
                    "Null": "NO",
                    "Key": "MUL",
                    "Default": null,
                    "Extra": "",
                    "name": "user_id",
                    "display": "User id",
                    "document_type": "integer",
                    "type": "number",
                    "rules": "required|integer"
                }
            ],
            "belongs_to_relationships" => [
                {
                    "CONSTRAINT_CATALOG": "def",
                    "CONSTRAINT_SCHEMA": "aws_product_management",
                    "CONSTRAINT_NAME": "products_user_id_foreign",
                    "TABLE_CATALOG": "def",
                    "TABLE_SCHEMA": "aws_product_management",
                    "TABLE_NAME": "products",
                    "COLUMN_NAME": "user_id",
                    "ORDINAL_POSITION": 1,
                    "POSITION_IN_UNIQUE_CONSTRAINT": 1,
                    "REFERENCED_TABLE_SCHEMA": "aws_product_management",
                    "REFERENCED_TABLE_NAME": "users",
                    "REFERENCED_COLUMN_NAME": "id",
                    "foreign_key": "products.user_id",
                    "references": "users.id"
                }
            ],
            "polymorphic_relationships" => [
                {
                    "Field": "purchasable_type",
                    "Type": "varchar(50)",
                    "Null": "NO",
                    "Key": "MUL",
                    "Default": null,
                    "Extra": "",
                    "name": "purchasable_type",
                    "display": "Purchasable type",
                    "document_type": "string",
                    "type": "text",
                    "rules": "required|max:50",
                    "polymorphic_type": "purchasable"
                }
            ]
        ]
 */

return [
    /**
     * This is the default template set that is used
     */
    'default' => [
        'templates' => [
            [
                'name' => 'model',
                'path' => "app/[[namespace]]/[[model_name]].php"
            ],
            [
                'name' => 'model_test',
                'path' => "tests/app/[[namespace]]/[[model_name]]Test.php"
            ],
            [
                'name' => 'model_controller',
                'path' => "app/Http/Controllers/[[model_name]]Controller.php"
            ],
            [
                'name' => 'model_controller_test',
                'path' => "tests/app/Http/Controllers/[[model_name]]ControllerTest.php"
            ],
            [
                'name' => 'model_factory',
                'path' => "database/factories/[[namespace]]/[[model_name]]Factory.php"
            ],
            [
                'name' => 'model_seeder',
                'path' => "database/seeds/[[model_name]]Seeder.php"
            ],

        ],

        /**
         * highest Priority options can only be overwritten form the command
         *      line using the --other-variables option
         */
        'options' => [
            'namespace' => 'Models'
        ],
    ],

    /**
     * This is a simple example of a template that you can create
     */
    'admin' => [
        'templates' => [
            [
                'name' => 'model',
                'path' => "app/[[model_name]].php"
            ],
        ],

        /**
         * highest Priority options can only be overwritten form the command
         *      line using the --other-variables option
         */
        'options' => [
            'namespace' => 'Middle\\Priority'
        ],
    ],

    /**
     * Global Setting You can over wright these in specific template options or
     *      by passing others in thew the commandline
     */
    'options' => [
        'namespace' => 'Models',
        'fully_qualified_base_model_name' => 'App\BaseModel',
        'base_model' => 'BaseModel'
    ],

    /**
     * Config Options
     */
    'config' => [
        'database' => 'base52'
    ],
];
