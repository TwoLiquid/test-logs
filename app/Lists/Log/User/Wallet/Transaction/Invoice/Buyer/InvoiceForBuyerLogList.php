<?php

namespace App\Lists\Log\User\Wallet\Transaction\Invoice\Buyer;

use App\Lists\BaseList;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class InvoiceForBuyerLogList
 *
 * @package App\Lists\Log\User\Wallet\Transaction\Invoice\Buyer
 */
class InvoiceForBuyerLogList extends BaseList
{
    /**
     * List name
     *
     * @var string
     */
    protected const LIST = 'log/user/wallet/transaction/invoice/buyer/buyer';

    /**
     * Invoice for buyer log list constant
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
                new InvoiceForBuyerLogListItem(
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
     * @return InvoiceForBuyerLogListItem|null
     */
    public static function getItem(
        ?int $id
    ) : ?InvoiceForBuyerLogListItem
    {
        $appendedItem = static::getAppendedItem($id);

        if ($appendedItem) {
            return new InvoiceForBuyerLogListItem(
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
     * @return InvoiceForBuyerLogListItem|null
     */
    public static function getItemByCode(
        string $code
    ) : ?InvoiceForBuyerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == $code) {
                return new InvoiceForBuyerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return InvoiceForBuyerLogListItem|null
     */
    public static function getCreated() : ?InvoiceForBuyerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'created') {
                return new InvoiceForBuyerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return InvoiceForBuyerLogListItem|null
     */
    public static function getPaid() : ?InvoiceForBuyerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'paid') {
                return new InvoiceForBuyerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return InvoiceForBuyerLogListItem|null
     */
    public static function getRefunded() : ?InvoiceForBuyerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'refunded') {
                return new InvoiceForBuyerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return InvoiceForBuyerLogListItem|null
     */
    public static function getPaidPartialRefund() : ?InvoiceForBuyerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'paid_partial_refund') {
                return new InvoiceForBuyerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return InvoiceForBuyerLogListItem|null
     */
    public static function getCanceled() : ?InvoiceForBuyerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'canceled') {
                return new InvoiceForBuyerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return InvoiceForBuyerLogListItem|null
     */
    public static function getChargeback() : ?InvoiceForBuyerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'chargeback') {
                return new InvoiceForBuyerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }
}
