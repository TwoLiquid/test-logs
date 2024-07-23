<?php

namespace App\Lists\Log\User\Wallet\Transaction\Invoice\Seller\Tip;

use App\Lists\BaseList;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class TipInvoiceForSellerLogList
 *
 * @package App\Lists\Log\User\Wallet\Transaction\Invoice\Seller\Tip
 */
class TipInvoiceForSellerLogList extends BaseList
{
    /**
     * List name
     *
     * @var string
     */
    protected const LIST = 'log/user/wallet/transaction/invoice/seller/tip';

    /**
     * Tip invoice for seller log list constant
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
            'code' => 'credit'
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
                new TipInvoiceForSellerLogListItem(
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
     * @return TipInvoiceForSellerLogListItem|null
     */
    public static function getItem(
        ?int $id
    ) : ?TipInvoiceForSellerLogListItem
    {
        $appendedItem = static::getAppendedItem($id);

        if ($appendedItem) {
            return new TipInvoiceForSellerLogListItem(
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
     * @return TipInvoiceForSellerLogListItem|null
     */
    public static function getItemByCode(
        string $code
    ) : ?TipInvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == $code) {
                return new TipInvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return TipInvoiceForSellerLogListItem|null
     */
    public static function getCreated() : ?TipInvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'created') {
                return new TipInvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return TipInvoiceForSellerLogListItem|null
     */
    public static function getPaid() : ?TipInvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'paid') {
                return new TipInvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return TipInvoiceForSellerLogListItem|null
     */
    public static function getCanceled() : ?TipInvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'canceled') {
                return new TipInvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return TipInvoiceForSellerLogListItem|null
     */
    public static function getCredit() : ?TipInvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'credit') {
                return new TipInvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }
}
