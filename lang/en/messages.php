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

    ],

    'next_button_text' => 'Next',
    'verify_otp_button_text' => 'Verify OTP',
    'authentication_error' => 'Authentication Error.',

];
