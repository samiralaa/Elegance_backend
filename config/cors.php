<?php

return [
   'paths' => ['api/*', 'sanctum/csrf-cookie'],

'allowed_methods' => ['*'],

'allowed_origins' => [
    'https://testfront.eleganceoud.com', // ✅ Your frontend domain
    'http://localhost:3000',             // Optional: keep if needed for local dev
],

'allowed_origins_patterns' => [],

'allowed_headers' => ['*'],

'exposed_headers' => [],

'max_age' => 0,

'supports_credentials' => true,

];
