<?php
return [

    'max_user_gallery' => 5,

    'sanctum_token_expiry' => env('SANCTUM_TOKEN_EXPIRY', '1440'), // Default 24 hours

    'allowed_ip_addresses' => [
        'telescope' => env('TELESCOPE_ALLOWED_IP_ADDRESSES'),
    ],

    'image' => [
        'dir_path' => '/storage/',
        'default_types' => 'gif|jpg|png|jpeg',
        'user_default_img' => 'images/default.jpg',
    ],

    'messages' => [
        'user' => [
            'invalid' => 'Invalid credentials.',
        ],

        'success' => 'Success',
        'delete_success' => 'Delete successfully.',
        'forgotpassword_success' => 'Password reset instructions has been sent to your email. Please check your inbox/spam.',
        'forgotpassword_error' => 'Invalid email.',
        'something_wrong' => 'Something went wrong.',
        'login' => [
            'success' => 'Login is successful.',
            'unverified_account' => 'Your account is not verified yet.',
            'wrong_credentials' => 'Invalid combination of email and password.',
            'login_token_failed' => 'Could not create login token.',
            'unauthorized_access' => 'You are not able to access this system.',
        ],
        'password_changed' => "Password has been changed.",
        'something_went_wrong' => 'Something went wrong.',
        'invalid_old_password' => "Invalid old password.",
        'similar_password' => "Please enter a password which is not similar then current password.",
        'not_match_confirm_password' => "New password is not match to confirm password.",
        'delete_sucess' => 'Delete successful.',
        'no_data_found' => 'No data found.',
        'token_amount_exceed' => 'Assign token total must be less or equal to ',
        'token_expire' => 'Invalid token id or token expired.',
        'delete_multiple_error' => 'Please select records.',
        'user_max_image_upload_error' => 'The gallery may not have more than 5 items.',
        'email_already_exist_error' => 'The email has already been taken.',
        'error_log_not_available' => 'Error logs are not available.',

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

    'allowed_ip_addresses' => [
        'telescope' => env('TELESCOPE_ALLOWED_IP_ADDRESSES'),
    ],
];
