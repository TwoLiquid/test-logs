<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Api Auth Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error
    | messages used by the validator class
    |
    */

    'search' => [
        'string' => 'The search must be a string.'
    ],
    'balance_type_id' => [
        'integer' => 'The balance type id must be an integer.',
        'between' => 'The balance type id must be between 1 and 3.'
    ],
    'date_from' => [
        'string'      => 'The date from must be a string.',
        'date_format' => 'The date from does not match the date format.'
    ],
    'date_to' => [
        'string'      => 'The date to must be a string.',
        'date_format' => 'The date to does not match the date format.'
    ],
    'page' => [
        'integer' => 'The page must be an integer.'
    ],
    'per_page' => [
        'integer'  => 'The per page must be an integer.'
    ],
    'result' => [
        'success' => 'User wallet transaction logs have been successfully received.'
    ]
];
