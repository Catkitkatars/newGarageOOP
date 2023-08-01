<?php

return [
    'sqlite' => [
        'path' => __DIR__ . '/database/sqlite_database.db',
        'main_table' => 'technics',
        'sub_tables' => [
            'cars' => 'cars_table',
            'motos' => 'motos_table',
            'bicycles' => 'bicycles_table'
        ],
        'banner_table' => 'main_banner'
    ],
    'advertisers' => [
        'dog' => 5,
        'cat' => 10,
    ],
    'templateAdvertisers' => [
        'url' => '../img/template.png',
    ]
];