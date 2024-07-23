<?php

namespace App\Transformers\Api\Guest\Log\User\Wallet\Transaction;

use App\Lists\User\Balance\Type\UserBalanceTypeListItem;
use App\Transformers\BaseTransformer;

/**
 * Class UserBalanceTypeTransformer
 *
 * @package App\Transformers\Api\Guest\Log\User\Wallet\Transaction
 */
class UserBalanceTypeTransformer extends BaseTransformer
{
    /**
     * @param UserBalanceTypeListItem $userBalanceTypeListItem
     *
     * @return array
     */
    public function transform(UserBalanceTypeListItem $userBalanceTypeListItem) : array
    {
        return [
            'id'        => $userBalanceTypeListItem->id,
            'code'      => $userBalanceTypeListItem->code,
            'name'      => $userBalanceTypeListItem->name,
            'id_prefix' => $userBalanceTypeListItem->idPrefix
        ];
    }

    /**
     * @return string
     */
    public function getItemKey() : string
    {
        return 'user_balance_type';
    }

    /**
     * @return string
     */
    public function getCollectionKey() : string
    {
        return 'user_balance_types';
    }
}
