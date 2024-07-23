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

    'balance_type_id' => [
        'required' => 'The balance type id field is required.',
        'integer'  => 'The balance type id field must be an integer.',
        'between'  => 'The balance type id field must be between 1 and 3.'
    ],
    'code' => [
        'required' => 'The code field is required.',
        'string'   => 'The code field must be a string.',
        'in'       => 'The code field is invalid.'
    ],
    'amount' => [
        'required' => 'The amount field is required.',
        'numeric'  => 'The amount field must be a numeric.'
    ],
    'pending_balance' => [
        'numeric' => 'The pending balance field must be a numeric.'
    ],
    'balance' => [
        'numeric' => 'The balance field must be a numeric.'
    ],
    'data' => [
        'required' => 'The data field is required.',
        'array'    => 'The data field must be an array.',
        'request' => [
            'required' => 'The request field is required.',
            'array'    => 'The request field must be an array.',
            'id' => [
                'required' => 'The id field is required.',
                'string'   => 'The id field must be a string.'
            ],
            'prefix' => [
                'required' => 'The prefix field is required.',
                'string'   => 'The prefix field must be a string.'
            ]
        ]
    ],
    'result' => [
        'error' => [
            'find'   => [
                'withdrawalRequestLog' => 'Failed to find an withdrawal request log.',
                'userBalanceType'      => 'Failed to find a user balance type.'
            ],
            'create' => 'Failed to create user wallet transaction log.',
        ],
        'success' => 'You have successfully add user wallet transaction log.'
    ]
];
