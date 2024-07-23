<?php

namespace App\Lists\Log\User\Wallet\Transaction\Invoice\Seller\Credit;

use App\Lists\BaseList;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CreditInvoiceForSellerLogList
 *
 * @package App\Lists\Log\User\Wallet\Transaction\Invoice\Seller\Credit
 */
class CreditInvoiceForSellerLogList extends BaseList
{
    /**
     * List name
     *
     * @var string
     */
    protected const LIST = 'log/user/wallet/transaction/invoice/seller/credit';

    /**
     * Credit invoice for seller log list constant
     */
    protected const ITEMS = [
        [
            'id'   => 1,
            'code' => 'created'
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
                new CreditInvoiceForSellerLogListItem(
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
     * @return CreditInvoiceForSellerLogListItem|null
     */
    public static function getItem(
        ?int $id
    ) : ?CreditInvoiceForSellerLogListItem
    {
        $appendedItem = static::getAppendedItem($id);

        if ($appendedItem) {
            return new CreditInvoiceForSellerLogListItem(
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
     * @return CreditInvoiceForSellerLogListItem|null
     */
    public static function getItemByCode(
        string $code
    ) : ?CreditInvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == $code) {
                return new CreditInvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return CreditInvoiceForSellerLogListItem|null
     */
    public static function getCreated() : ?CreditInvoiceForSellerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'created') {
                return new CreditInvoiceForSellerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }
}
