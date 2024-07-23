<?php

namespace App\Lists\Log\User\Wallet\Transaction\Order\Item;

use App\Lists\BaseList;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class OrderItemLogList
 *
 * @package App\Lists\Log\User\Wallet\Transaction\Order\Item
 */
class OrderItemLogList extends BaseList
{
    /**
     * List name
     *
     * @var string
     */
    protected const LIST = 'log/user/wallet/transaction/order/item';

    /**
     * Order item log list constant
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
            'code' => 'refunded'
        ],
        [
            'id'   => 4,
            'code' => 'paid_partial_refund'
        ],
        [
            'id'   => 5,
            'code' => 'canceled'
        ],
        [
            'id'   => 6,
            'code' => 'chargeback'
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
                new OrderItemLogListItem(
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
     * @return OrderItemLogListItem|null
     */
    public static function getItem(
        ?int $id
    ) : ?OrderItemLogListItem
    {
        $appendedItem = static::getAppendedItem($id);

        if ($appendedItem) {
            return new OrderItemLogListItem(
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
     * @return OrderItemLogListItem|null
     */
    public static function getItemByCode(
        string $code
    ) : ?OrderItemLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == $code) {
                return new OrderItemLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return OrderItemLogListItem|null
     */
    public static function getCreated() : ?OrderItemLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'created') {
                return new OrderItemLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return OrderItemLogListItem|null
     */
    public static function getPaid() : ?OrderItemLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'paid') {
                return new OrderItemLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return OrderItemLogListItem|null
     */
    public static function getRefunded() : ?OrderItemLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'refunded') {
                return new OrderItemLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return OrderItemLogListItem|null
     */
    public static function getPaidPartialRefund() : ?OrderItemLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'paid_partial_refund') {
                return new OrderItemLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return OrderItemLogListItem|null
     */
    public static function getCanceled() : ?OrderItemLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'canceled') {
                return new OrderItemLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return OrderItemLogListItem|null
     */
    public static function getChargeback() : ?OrderItemLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'chargeback') {
                return new OrderItemLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }
}
