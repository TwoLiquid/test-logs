<?php

namespace App\Lists\Log\User\Wallet\Transaction\AddFunds\Receipt;

use App\Lists\BaseList;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class AddFundsReceiptLogList
 *
 * @package App\Lists\Log\User\Wallet\Transaction\AddFunds\Receipt
 */
class AddFundsReceiptLogList extends BaseList
{
    /**
     * List name
     *
     * @var string
     */
    protected const LIST = 'log/user/wallet/transaction/addFunds/receipt';

    /**
     * Add funds log list constant
     */
    protected const ITEMS = [
        [
            'id'   => 1,
            'code' => 'created'
        ],
        [
            'id'   => 2,
            'code' => 'paid'
        ],
        [
            'id'   => 3,
            'code' => 'canceled'
        ],
        [
            'id'   => 4,
            'code' => 'refunded'
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
                new AddFundsReceiptLogListItem(
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
     * @return AddFundsReceiptLogListItem|null
     */
    public static function getItem(
        ?int $id
    ) : ?AddFundsReceiptLogListItem
    {
        $appendedItem = static::getAppendedItem($id);

        if ($appendedItem) {
            return new AddFundsReceiptLogListItem(
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
     * @return AddFundsReceiptLogListItem|null
     */
    public static function getItemByCode(
        string $code
    ) : ?AddFundsReceiptLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == $code) {
                return new AddFundsReceiptLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return AddFundsReceiptLogListItem|null
     */
    public static function getCreated() : ?AddFundsReceiptLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'created') {
                return new AddFundsReceiptLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return AddFundsReceiptLogListItem|null
     */
    public static function getPaid() : ?AddFundsReceiptLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'paid') {
                return new AddFundsReceiptLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return AddFundsReceiptLogListItem|null
     */
    public static function getCanceled() : ?AddFundsReceiptLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'canceled') {
                return new AddFundsReceiptLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return AddFundsReceiptLogListItem|null
     */
    public static function getRefunded() : ?AddFundsReceiptLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'refunded') {
                return new AddFundsReceiptLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }
}
