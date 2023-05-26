<?php

return [
    'mysql' => [
        'servername' => "localhost",
        'username' => "root",
        'password' => "root",
        'dbname' => "first_db",
        'tableName' => [
            'cards_db' => "GarageWithCars",
            'moto_db' => "GarageWithMoto",
            'banner_db' => "MainBanner",
        ]
    ],
    'advertisers' => [
        'dog' => 5,
        'cat' => 10,
    ],
    'templateAdvertisers' => [
        'url' => '../img/template.png',
    ]
];