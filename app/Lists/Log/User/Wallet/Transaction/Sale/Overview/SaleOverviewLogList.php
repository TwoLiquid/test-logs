<?php

namespace App\Lists\Log\User\Wallet\Transaction\Sale\Overview;

use App\Lists\BaseList;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class SaleOverviewLogList
 *
 * @package App\Lists\Log\User\Wallet\Transaction\Sale\Overview
 */
class SaleOverviewLogList extends BaseList
{
    /**
     * List name
     *
     * @var string
     */
    protected const LIST = 'log/user/wallet/transaction/sale/overview';

    /**
     * Sale overview log list constant
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
                new SaleOverviewLogListItem(
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
     * @return SaleOverviewLogListItem|null
     */
    public static function getItem(
        ?int $id
    ) : ?SaleOverviewLogListItem
    {
        $appendedItem = static::getAppendedItem($id);

        if ($appendedItem) {
            return new SaleOverviewLogListItem(
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
     * @return SaleOverviewLogListItem|null
     */
    public static function getItemByCode(
        string $code
    ) : ?SaleOverviewLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == $code) {
                return new SaleOverviewLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return SaleOverviewLogListItem|null
     */
    public static function getCreated() : ?SaleOverviewLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'created') {
                return new SaleOverviewLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return SaleOverviewLogListItem|null
     */
    public static function getPaid() : ?SaleOverviewLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'paid') {
                return new SaleOverviewLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return SaleOverviewLogListItem|null
     */
    public static function getRefunded() : ?SaleOverviewLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'refunded') {
                return new SaleOverviewLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return SaleOverviewLogListItem|null
     */
    public static function getPaidPartialRefund() : ?SaleOverviewLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'paid_partial_refund') {
                return new SaleOverviewLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return SaleOverviewLogListItem|null
     */
    public static function getCanceled() : ?SaleOverviewLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'canceled') {
                return new SaleOverviewLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return SaleOverviewLogListItem|null
     */
    public static function getChargeback() : ?SaleOverviewLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'chargeback') {
                return new SaleOverviewLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }
}
