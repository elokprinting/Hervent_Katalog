<?php

return [
    /*
    | Password hash for the production content area. Generate it with:
    | php artisan tinker --execute="echo Hash::make('a-long-unique-password');"
    */
    'password_hash' => env('PRODUCTION_PASSWORD_HASH'),
];
