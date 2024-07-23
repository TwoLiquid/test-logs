<?php

namespace App\Lists\Log\User\Wallet\Transaction\Order\Overview;

/**
 * Class OrderOverviewLogListItem
 *
 * @property int $id
 * @property string $code
 * @property string $name
 *
 * @package App\Log\User\Wallet\Transaction\Order\Overview
 */
class OrderOverviewLogListItem
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
     * OrderOverviewLogListItem constructor
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
    public function isPaidOverpayment() : bool
    {
        if ($this->code == 'paid_overpayment') {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isRefunded() : bool
    {
        if ($this->code == 'refunded') {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isPaidPartialRefund() : bool
    {
        if ($this->code == 'paid_partial_refund') {
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
    public function isChargeback() : bool
    {
        if ($this->code == 'chargeback') {
            return true;
        }

        return false;
    }
}
