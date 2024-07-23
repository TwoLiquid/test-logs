<?php

namespace App\Lists\Log\User\Wallet\Transaction\Invoice\Buyer\Tip;

use App\Lists\BaseList;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class TipInvoiceForBuyerLogList
 *
 * @package App\Lists\Log\User\Wallet\Transaction\Invoice\Buyer\Tip
 */
class TipInvoiceForBuyerLogList extends BaseList
{
    /**
     * List name
     *
     * @var string
     */
    protected const LIST = 'log/user/wallet/transaction/invoice/buyer/tip';

    /**
     * Tip invoice for buyer log list constant
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
                new TipInvoiceForBuyerLogListItem(
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
     * @return TipInvoiceForBuyerLogListItem|null
     */
    public static function getItem(
        ?int $id
    ) : ?TipInvoiceForBuyerLogListItem
    {
        $appendedItem = static::getAppendedItem($id);

        if ($appendedItem) {
            return new TipInvoiceForBuyerLogListItem(
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
     * @return TipInvoiceForBuyerLogListItem|null
     */
    public static function getItemByCode(
        string $code
    ) : ?TipInvoiceForBuyerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == $code) {
                return new TipInvoiceForBuyerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return TipInvoiceForBuyerLogListItem|null
     */
    public static function getCreated() : ?TipInvoiceForBuyerLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'created') {
                return new TipInvoiceForBuyerLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }
}
