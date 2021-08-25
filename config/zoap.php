<?php

return [
    
    // Service configurations.

    'services'          => [
        
        'rayen'              => [
            'name'              => 'Rayen',
            'class'             => 'App\Soap\RayenService',
            'exceptions'        => [
                'Exception'
            ],
            'types'             => [
                'keyValue'          => 'App\Soap\Types\KeyValue',
                'response'          => 'App\Soap\Types\Response',
                'product'           => 'App\Soap\Types\Product'
            ],
            'strategy'          => 'ArrayOfTypeComplex',
            'headers'           => [
                'Cache-Control'     => 'no-cache, no-store'
            ],
            'options'           => []
        ]
        
    ],

    
    // Log exception trace stack?

    'logging'       => true,

    
    // Mock credentials for demo.

    'mock'          => [
        'user'              => ENV('SOAP_USER'),
        'password'          => ENV('SOAP_PASSWORD'),
        'token'             => ENV('SOAP_TOKEN')
    ],
    
];
