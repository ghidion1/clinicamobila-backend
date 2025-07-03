<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [
        'http://localhost:5173',      // Pentru frontend local
        'http://localhost:3000',
        'https://emanuel-cioburciu.md', // Domeniul tău public
        'https://netlify.app',           // Sau domeniul Netlify dacă îl folosești
    ],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
