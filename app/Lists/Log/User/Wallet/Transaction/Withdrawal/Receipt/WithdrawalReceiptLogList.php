<?php

namespace App\Lists\Log\User\Wallet\Transaction\Withdrawal\Receipt;

use App\Lists\BaseList;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class WithdrawalReceiptLogList
 *
 * @package App\Lists\Log\User\Wallet\Transaction\Withdrawal\Receipt
 */
class WithdrawalReceiptLogList extends BaseList
{
    /**
     * List name
     *
     * @var string
     */
    protected const LIST = 'log/user/wallet/transaction/withdrawal/receipt';

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
            'code' => 'paid'
        ],
        [
            'id'   => 3,
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
                new WithdrawalReceiptLogListItem(
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
     * @return WithdrawalReceiptLogListItem|null
     */
    public static function getItem(
        ?int $id
    ) : ?WithdrawalReceiptLogListItem
    {
        $appendedItem = static::getAppendedItem($id);

        if ($appendedItem) {
            return new WithdrawalReceiptLogListItem(
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
     * @return WithdrawalReceiptLogListItem|null
     */
    public static function getItemByCode(
        string $code
    ) : ?WithdrawalReceiptLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == $code) {
                return new WithdrawalReceiptLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return WithdrawalReceiptLogListItem|null
     */
    public static function getCreated() : ?WithdrawalReceiptLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'created') {
                return new WithdrawalReceiptLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return WithdrawalReceiptLogListItem|null
     */
    public static function getPaid() : ?WithdrawalReceiptLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'paid') {
                return new WithdrawalReceiptLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }

    /**
     * @return WithdrawalReceiptLogListItem|null
     */
    public static function getCredit() : ?WithdrawalReceiptLogListItem
    {
        $appendedItems = static::getAppendedItems();

        /** @var array $appendedItem */
        foreach ($appendedItems as $appendedItem) {
            if ($appendedItem['code'] == 'credit') {
                return new WithdrawalReceiptLogListItem(
                    $appendedItem['id'],
                    $appendedItem['code'],
                    $appendedItem['name']
                );
            }
        }

        return null;
    }
}
