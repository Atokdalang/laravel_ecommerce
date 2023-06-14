<?php

return [
    'serverKey' => env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-p2cJgEH7JWbZRLANoOsiJRCo'),
    'clientKey' => env('MIDTRANS_CLIENT_KEY', 'SB-Mid-client-pOP5VR1Ht-H--c3q'),
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    'isSanitized' => env('MIDTRANS_IS_SANITIZED', true),
    'is3ds' => env('MIDTRANS_IS_3DS', true)
];
