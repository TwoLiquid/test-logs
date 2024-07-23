<?php

namespace App\Lists\Log\User\Wallet\Transaction\Withdrawal\Request;

/**
 * Class WithdrawalRequestLogListItem
 *
 * @property int $id
 * @property string $code
 * @property string $name
 *
 * @package App\Log\User\Wallet\Transaction\Withdrawal\Request
 */
class WithdrawalRequestLogListItem
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
     * WithdrawalRequestLogListItem constructor
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
    public function isDeclined() : bool
    {
        if ($this->code == 'declined') {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isAccepted() : bool
    {
        if ($this->code == 'accepted') {
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
}
