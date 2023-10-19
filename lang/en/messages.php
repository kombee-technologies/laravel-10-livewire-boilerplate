<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'side_menu' => [
       'dashboard' => 'Dashboard',
       'user' => 'Manage Users',
       'label_logout' => 'Sign Out',
    ],

    'login' => [
        'heading_title' => 'Central admin',
        'title' => 'Login',
        'verify_otp_title' => 'OTP Verification',

        'label_email' => 'Email',
        'label_password' => 'Password',
        'label_verify_otp' => 'Enter OTP',

        'remember_me' => 'Remember Me',
        'otp_successfully' => 'OTP sent successfully.',
        'invalid_credentials_error' =>  'Oppes! You have entered invalid credentials',
        'invalid_otp_error' =>  'Invalid code. Please try again',

        'otp_subject' => 'Your login Verification Code'
    ],

    'dashboard' => [
        'title' => 'Dashboard',
    ],

    'user' => [

        'breadcrumb' => [
            'home' => 'Home',
            'user' => 'Users',
            'user_listing' => 'User Listing',
        ],

        'index' => [
          'header_title' => 'Users List',
          'add' => 'Add'
        ],

        'create' => [
            'label_first_name'=> 'First name',
            'label_last_name'=> 'Last name',
            'label_email'=> 'Email',
            'label_mobile_no'=> 'Mobile No',
            'label_address'=> 'Address',
            'label_country'=> 'Country',
            'label_state'=> 'State',
            'label_city'=> 'City',
            'label_birthday'=> 'Birthday',
            'label_gender'=> 'Gender',
            'label_hobbies'=> 'Hobbies',
            'label_image_upload'=> 'Image Upload',



            'placeholder_country' => 'Select country',
            'placeholder_state' => 'Select state',
            'placeholder_city' => 'Select city',
        ],

        'messages' => [
          'store' => 'User Created Successfully.'
        ]

    ],

    'next_button_text' => 'Next',
    'cancel_button_text' => 'Cancel',
    'create_button_text' => 'Create',
    'verify_otp_button_text' => 'Verify OTP',
    'authentication_error' => 'Authentication Error.',

];
