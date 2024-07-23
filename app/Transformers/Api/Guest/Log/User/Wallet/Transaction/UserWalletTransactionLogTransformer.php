<?php

namespace App\Transformers\Api\Guest\Log\User\Wallet\Transaction;

use App\Models\MongoDb\UserWalletTransactionLog;
use App\Transformers\BaseTransformer;
use League\Fractal\Resource\Item;

/**
 * Class UserWalletTransactionLogTransformer
 *
 * @package App\Transformers\Api\Guest\Log\User\Wallet\Transaction
 */
class UserWalletTransactionLogTransformer extends BaseTransformer
{
    /**
     * @var array
     */
    protected array $defaultIncludes = [
        'user_balance_type',
    ];

    /**
     * @param UserWalletTransactionLog $userWalletTransactionLog
     *
     * @return array
     */
    public function transform(UserWalletTransactionLog $userWalletTransactionLog) : array
    {
        return [
            'id'              => $userWalletTransactionLog->_id,
            'auth_id'         => $userWalletTransactionLog->auth_id,
            'amount'          => $userWalletTransactionLog->amount,
            'pending_balance' => $userWalletTransactionLog->pending_balance,
            'balance'         => $userWalletTransactionLog->balance,
            'template'        => $userWalletTransactionLog->template,
            'data'            => $userWalletTransactionLog->data,
            'created_at'      => $userWalletTransactionLog->created_at->format('Y-m-d\TH:i:s.v\Z')
        ];
    }

    /**
     * @param UserWalletTransactionLog $userWalletTransactionLog
     *
     * @return Item|null
     */
    public function includeUserBalanceType(UserWalletTransactionLog $userWalletTransactionLog) : ?Item
    {
        $userBalanceType = $userWalletTransactionLog->getBalanceType();

        return $userBalanceType ? $this->item($userBalanceType, new UserBalanceTypeTransformer) : null;
    }

    /**
     * @return string
     */
    public function getItemKey() : string
    {
        return 'log';
    }

    /**
     * @return string
     */
    public function getCollectionKey() : string
    {
        return 'logs';
    }
}
