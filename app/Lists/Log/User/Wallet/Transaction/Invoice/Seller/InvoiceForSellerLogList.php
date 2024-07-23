<?php

namespace App\Lists\Log\User\Wallet\Transaction\Invoice\Seller;

use App\Lists\BaseList;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class InvoiceForSellerLogList
 *
 * @package App\Lists\Log\User\Wallet\Transaction\Invoice\Seller
 */
class InvoiceForSellerLogList extends BaseList
{
    /**
     * List name
     *
     * @var string
     */
    protected const LIST = 'log/user/wallet/transaction/invoice/seller/seller';

    /**
     * Invoice for seller log list constant
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
                new InvoiceForSellerLogListItem(
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
     * @return InvoiceForSellerLogListItem|null
     */
    public static function getItem(
        ?int $id
    ) : ?InvoiceForSellerLogListItem
    {
        $appendedItem = static::getAppendedItem($id);

        if ($appendedItem) {
            return new InvoiceForSellerLogListItem(
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
     * @return InvoiceForSellerLogListItem|null
     */
    public static function getItemByCode(
        string $code
    ) : ?InvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == $code) {
                return new InvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return InvoiceForSellerLogListItem|null
     */
    public static function getCreated() : ?InvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'created') {
                return new InvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return InvoiceForSellerLogListItem|null
     */
    public static function getPaid() : ?InvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'paid') {
                return new InvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return InvoiceForSellerLogListItem|null
     */
    public static function getRefunded() : ?InvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'refunded') {
                return new InvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return InvoiceForSellerLogListItem|null
     */
    public static function getPaidPartialRefund() : ?InvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'paid_partial_refund') {
                return new InvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return InvoiceForSellerLogListItem|null
     */
    public static function getCanceled() : ?InvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'canceled') {
                return new InvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return InvoiceForSellerLogListItem|null
     */
    public static function getChargeback() : ?InvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'chargeback') {
                return new InvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }
}
