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
        'credit' => [
            'required' => 'The credit field is required.',
            'array'    => 'The credit field must be an array.',
            'id' => [
                'required' => 'The id field is required.',
                'integer'  => 'The id field must be an integer.'
            ],
            'prefix' => [
                'required' => 'The prefix field is required.',
                'string'   => 'The prefix field must be a string.'
            ]
        ],
        'invoice' => [
            'required' => 'The invoice field is required.',
            'array'    => 'The invoice field must be an array.',
            'id' => [
                'required' => 'The id field is required.',
                'integer'  => 'The id field must be an integer.'
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
                'balanceSellerCreditInvoiceForBuyerLog' => 'Failed to find a balance buyer credit invoice for buyer log.',
                'userBalanceType'                       => 'Failed to find a user balance type.'
            ],
            'create' => 'Failed to create user wallet transaction log.',
        ],
        'success' => 'You have successfully add user wallet transaction log.'
    ]
];
