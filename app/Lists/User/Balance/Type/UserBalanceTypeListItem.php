<?php

namespace App\Lists\User\Balance\Type;

/**
 * Class UserBalanceTypeListItem
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $idPrefix
 *
 * @package App\Lists\User\Balance\Type
 */
class UserBalanceTypeListItem
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
     * @var string
     */
    public string $idPrefix;

    /**
     * UserBalanceTypeListItem constructor
     *
     * @param int $id
     * @param string $code
     * @param string $name
     * @param string $idPrefix
     */
    public function __construct(
        int $id,
        string $code,
        string $name,
        string $idPrefix
    )
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->idPrefix = $idPrefix;
    }

    /**
     * @return bool
     */
    public function isBuyer() : bool
    {
        if ($this->code == 'buyer') {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isSeller() : bool
    {
        if ($this->code == 'seller') {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isAffiliate() : bool
    {
        if ($this->code == 'affiliate') {
            return true;
        }

        return false;
    }
}
