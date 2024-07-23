<?php

namespace App\Lists\Log\User\Wallet\Transaction\Invoice\Buyer\Credit;

use App\Lists\BaseList;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CreditInvoiceForBuyerLogList
 *
 * @package App\Lists\Log\User\Wallet\Transaction\Invoice\Buyer\Credit
 */
class CreditInvoiceForBuyerLogList extends BaseList
{
    /**
     * List name
     *
     * @var string
     */
    protected const LIST = 'log/user/wallet/transaction/invoice/buyer/credit';

    /**
     * Credit invoice for buyer log list constant
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
                new CreditInvoiceForBuyerLogListItem(
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
     * @return CreditInvoiceForBuyerLogListItem|null
     */
    public static function getItem(
        ?int $id
    ) : ?CreditInvoiceForBuyerLogListItem
    {
        $appendedItem = static::getAppendedItem($id);

        if ($appendedItem) {
            return new CreditInvoiceForBuyerLogListItem(
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
     * @return CreditInvoiceForBuyerLogListItem|null
     */
    public static function getItemByCode(
        string $code
    ) : ?CreditInvoiceForBuyerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == $code) {
                return new CreditInvoiceForBuyerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return CreditInvoiceForBuyerLogListItem|null
     */
    public static function getCreated() : ?CreditInvoiceForBuyerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'created') {
                return new CreditInvoiceForBuyerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }
}
