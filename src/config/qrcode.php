<?php

return [
    /*
    |--------------------------------------------------------------------------
    | QR Code Backend
    |--------------------------------------------------------------------------
    |
    | This option controls the default QR code backend that will be used
    | by the QR code library. You can change this to use a different
    | backend if you prefer.
    |
    | Supported: "imagick", "svg", "eps", "pdf"
    |
    */
    'backend' => env('QR_CODE_BACKEND', 'svg'),

    /*
    |--------------------------------------------------------------------------
    | QR Code Size
    |--------------------------------------------------------------------------
    |
    | This option controls the default size of the QR code.
    |
    */
    'size' => env('QR_CODE_SIZE', 300),

    /*
    |--------------------------------------------------------------------------
    | QR Code Margin
    |--------------------------------------------------------------------------
    |
    | This option controls the default margin of the QR code.
    |
    */
    'margin' => env('QR_CODE_MARGIN', 2),

    /*
    |--------------------------------------------------------------------------
    | QR Code Error Correction Level
    |--------------------------------------------------------------------------
    |
    | This option controls the default error correction level of the QR code.
    |
    | Supported: "L", "M", "Q", "H"
    |
    */
    'error_correction' => env('QR_CODE_ERROR_CORRECTION', 'M'),

    /*
    |--------------------------------------------------------------------------
    | QR Code Colors
    |--------------------------------------------------------------------------
    |
    | This option controls the default colors of the QR code.
    |
    */
    'colors' => [
        'foreground' => env('QR_CODE_FOREGROUND_COLOR', '#000000'),
        'background' => env('QR_CODE_BACKGROUND_COLOR', '#FFFFFF'),
    ],
];
