<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook'=>[
        'client_id'=>env('FACEBOOK_CLIENT_ID'),
        'client_secret'=>env('FACEBOOK_CLIENT_SECRET'),
        'redirect'=>env('FACEBOOK_REDIRECT_CALLBACK'),
    ],
    'google'=>[
        'client_id'=>env('GOOGLE_CLIENT_ID'),
        'client_secret'=>env('GOOGLE_CLIENT_SECRET'),
        'redirect'=>env('GOOGLE_REDIRECT_CALLBACK'),
    ],
    'paypal'=>[
        'base_uri' => env('PAYPAL_BASE_URI'),
        'client_id'=>env('PAYPAL_CLIENT_ID'),
        'client_secret'=>env('PAYPAL_CLIENT_SECRET')
    ],
    'pagopar'=>[
        'base_uri' => env('PAGOPAR_BASE_URI'),
        'token_public'=>env('PAGOPAR_TOKEN_PUBLIC'),
        'token_private'=>env('PAGOPAR_TOKEN_PRIVATE')
    ],
    'nexmo'=>[
        'sms_from' => '595991631870'
    ]

];
