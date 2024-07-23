<?php

namespace App\Lists\Log\User\Wallet\Transaction\Withdrawal\Request;

use App\Lists\BaseList;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class WithdrawalRequestLogList
 *
 * @package App\Lists\Log\User\Wallet\Transaction\Withdrawal\Request
 */
class WithdrawalRequestLogList extends BaseList
{
    /**
     * List name
     *
     * @var string
     */
    protected const LIST = 'log/user/wallet/transaction/withdrawal/request';

    /**
     * Withdrawal request log list constant
     */
    protected const ITEMS = [
        [
            'id'   => 1,
            'code' => 'created'
        ],
        [
            'id'   => 2,
            'code' => 'declined'
        ],
        [
            'id'   => 3,
            'code' => 'accepted'
        ],
        [
            'id'   => 4,
            'code' => 'canceled'
        ]
    ];

    /**
     * List of fields requiring translation
     */
    protected const TRANSLATES = [
        'name'
    ];

    /**
     * @return Collection
     */
    public static function getItems() : Collection
    {
        $appendedItems = static::getAppendedItems();

        $items = new Collection();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            $items->push(
                new WithdrawalRequestLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                )
            );
        }

        return $items;
    }

    /**
     * @param int|null $id
     *
     * @return WithdrawalRequestLogListItem|null
     */
    public static function getItem(
        ?int $id
    ) : ?WithdrawalRequestLogListItem
    {
        $appendedItem = static::getAppendedItem($id);

        if ($appendedItem) {
            return new WithdrawalRequestLogListItem(
                $appendedItem['id'],
                $appendedItem['code'],
                $appendedItem['name']
            );
        }

        return null;
    }

    /**
     * @param string $code
     *
     * @return WithdrawalRequestLogListItem|null
     */
    public static function getItemByCode(
        string $code
    ) : ?WithdrawalRequestLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == $code) {
                return new WithdrawalRequestLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return WithdrawalRequestLogListItem|null
     */
    public static function getCreated() : ?WithdrawalRequestLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'created') {
                return new WithdrawalRequestLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return WithdrawalRequestLogListItem|null
     */
    public static function getDeclined() : ?WithdrawalRequestLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'declined') {
                return new WithdrawalRequestLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return WithdrawalRequestLogListItem|null
     */
    public static function getAccepted() : ?WithdrawalRequestLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'accepted') {
                return new WithdrawalRequestLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return WithdrawalRequestLogListItem|null
     */
    public static function getCanceled() : ?WithdrawalRequestLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'canceled') {
                return new WithdrawalRequestLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }
}
