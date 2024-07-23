<?php

namespace App\Lists\Log\User\Wallet\Transaction\Invoice\Buyer\Tip;

/**
 * Class TipInvoiceForBuyerLogListItem
 *
 * @property int $id
 * @property string $code
 * @property string $name
 *
 * @package App\Log\User\Wallet\Transaction\Invoice\Buyer\Tip
 */
class TipInvoiceForBuyerLogListItem
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    public string $code;

    /**
     * @var string
     */
    public string $name;

    /**
     * TipInvoiceForBuyerLogListItem constructor
     *
     * @param int $id
     * @param string $code
     * @param string $name
     */
    public function __construct(
        int $id,
        string $code,
        string $name
    )
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isCreated() : bool
    {
        if ($this->code == 'created') {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isPaid() : bool
    {
        if ($this->code == 'paid') {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isCanceled() : bool
    {
        if ($this->code == 'canceled') {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isCredit() : bool
    {
        if ($this->code == 'credit') {
            return true;
        }

        return false;
    }
}
