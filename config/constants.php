<?php
return [
    'allowed_ip_addresses' => [
        'telescope' => env('TELESCOPE_ALLOWED_IP_ADDRESSES'),
    ],

    'image' => [
        'dir_path' => '/storage/',
        'default_types' => 'gif|jpg|png|jpeg',
        'user_default_img' => 'images/default.jpg',
    ],

    'validation_codes' => [
        'unauthorized' => 401,
        'forbidden' => 403,
        'unprocessable_entity' => 422,
        'ok' => 200,
    ],

    'user' => [

        'user_type' => [
            '0' => 'Admin',
            '1' => 'Author',
            '2' => 'User',
        ],

        'user_type_enum' => ['0', '1', '2'],

        'status' => [
            '0' => 'Inactive',
            '1' => 'Active',
        ],
        'status_enum' => ['0', '1'],

        'gender' => [
            '0' => 'Female',
            '1' => 'Male',
        ],

        'gender_enum' => ['0', '1'],
    ],

];
