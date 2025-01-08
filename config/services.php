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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Tokko Broker API
    |--------------------------------------------------------------------------
    |
    | Estos valores son de la TOKKO API. Los valores son usados cuando la
    | aplicación necesita consultar la API para obtener los datos de la
    | inmobiliaria.
    |
    */

    'tokko' => [
        'domain' => env('TOKKO_API_URL', 'http://tokkobroker.com/api/v1/'),
        'key' => env('TOKKO_API_KEY'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Recaptcha
    |--------------------------------------------------------------------------
    |
    | Estos valores son de Google Recaptcha. Los valores son usados cuando la
    | aplicación necesita validar un formulario con recaptcha.
    |
    */

    'recaptcha' => [
        'key' => env('RECAPTCHA_KEY'),
        'secret' => env('RECAPTCHA_SECRET'),
    ],

];
