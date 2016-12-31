<?php
return array(
    'controllers' => array(
        'factories' => [
            'Firelike\LitRes\Controller\Console' => Firelike\LitRes\Controller\Factory\ConsoleControllerFactory::class
        ]
    ),
    'service_manager' => array(
        'factories' => array(
            Firelike\LitRes\Service\LitResService::class => Firelike\LitRes\Service\Factory\LitResServiceFactory::class,
            Firelike\LitRes\Validator\LitResServiceRequestValidator::class => Firelike\LitRes\Validator\Factory\LitResServiceRequestValidatorFactory::class,
            Firelike\LitRes\Validator\SearchTypeValidator::class => Firelike\LitRes\Validator\Factory\SearchTypeValidatorFactory::class,
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'litres-search' => array(
                    'options' => array(
                        'route' => 'litres browser [--search=] [--verbose|-v]',
                        'defaults' => array(
                            'controller' => 'Firelike\LitRes\Controller\Console',
                            'action' => 'browser'
                        )
                    )
                ),
                'litres-lookup' => array(
                    'options' => array(
                        'route' => 'litres genres [--verbose|-v]',
                        'defaults' => array(
                            'controller' => 'Firelike\LitRes\Controller\Console',
                            'action' => 'genres'
                        )
                    )
                ),
                'litres-feed' => array(
                    'options' => array(
                        'route' => 'litres persons [--search_person=] [--verbose|-v]',
                        'defaults' => array(
                            'controller' => 'Firelike\LitRes\Controller\Console',
                            'action' => 'persons'
                        )
                    )
                ),
            )
        )
    ),
    'litres_service' => [
        'description' => [
            'baseUri' => 'http://robot.litres.ru',
            'apiVersion' => 'v1',
            'operations' => [
                'browser_command' => [
                    'httpMethod' => 'GET',
                    'uri' => '/pages/catalit_browser',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'lang' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'query',
                            'description' => 'Language'
                        ],
                        'search' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'query',
                            'description' => 'the search keyword'
                        ],
                        'limit' => [
                            'type' => 'integer',
                            'required' => false,
                            'location' => 'query',
                            'description' => 'limit',
                            'default' => 100
                        ],
                        'sort' => [
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query',
                            'description' => 'sort',
                            'default' => 'asc'
                        ]
                    ]
                ],
                'genres_command' => [
                    'httpMethod' => 'GET',
                    'uri' => '/pages/catalit_genres',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'lang' => [
                            "type" => "string",
                            'required' => true,
                            "location" => "query",
                            "description" => "Language"
                        ],
                        'search_type' => [
                            "type" => "string",
                            'required' => false,
                            "location" => "query",
                            "description" => "Search Type"
                        ],
                    ]
                ],
                'persons_command' => [
                    'httpMethod' => 'GET',
                    'uri' => '/pages/catalit_persons',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'person' => [
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query'
                        ],
                        'search_person' => [
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query'
                        ],
                        'search_last_name' => [
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query'
                        ],
                        'rating' => [
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query'
                        ],
                        'rating_period' => [
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query',
                        ],
                        'search_types' => [
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query'
                        ]
                    ]
                ],
            ],
            'models' => [
                'getResponse' => [
                    'type' => 'object',
                    "properties" => [
                        "success" => [
                            "type" => "string",
                            "required" => true
                        ],
                        "errors" => [
                            "type" => "array",
                            "items" => [
                                "type" => "object",
                                "properties" => [
                                    "code" => [
                                        "type" => "string",
                                        "description" => "The error code."
                                    ],
                                    "message" => [
                                        "type" => "string",
                                        "description" => "The detailed message from the server."
                                    ]
                                ]
                            ]
                        ]
                    ],
                    'additionalProperties' => [
                        'location' => 'xml'
                    ]
                ]
            ]
        ]
    ]
);


