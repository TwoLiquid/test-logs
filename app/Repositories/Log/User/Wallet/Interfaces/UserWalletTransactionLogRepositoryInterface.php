<?php

namespace App\Repositories\Log\User\Wallet\Interfaces;

use App\Lists\User\Balance\Type\UserBalanceTypeListItem;
use App\Models\MongoDb\UserWalletTransactionLog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Interface UserWalletTransactionLogRepositoryInterface
 *
 * @package App\Repositories\Log\User\Wallet\Interfaces
 */
interface UserWalletTransactionLogRepositoryInterface
{
    /**
     * This method provides finding a single row
     * with an eloquent model by primary key
     *
     * @param int|null $id
     *
     * @return UserWalletTransactionLog|null
     */
    public function findById(
        ?int $id
    ) : ?UserWalletTransactionLog;

    /**
     * This method provides getting all rows
     * with an eloquent model
     *
     * @return Collection
     */
    public function getAll() : Collection;

    /**
     * This method provides getting all rows
     * with an eloquent model with pagination
     *
     * @param int|null $page
     * @param int|null $perPage
     *
     * @return LengthAwarePaginator
     */
    public function getAllPaginated(
        ?int $page,
        ?int $perPage
    ) : LengthAwarePaginator;

    /**
     * This method provides getting all rows
     * with an eloquent model with pagination
     *
     * @param int $authId
     * @param string|null $search
     * @param UserBalanceTypeListItem|null $userBalanceTypeListItem
     * @param string|null $dateFrom
     * @param string|null $dateTo
     * @param int|null $page
     * @param int|null $perPage
     *
     * @return LengthAwarePaginator
     */
    public function getAllByAuthIdPaginated(
        int $authId,
        ?string $search,
        ?UserBalanceTypeListItem $userBalanceTypeListItem,
        ?string $dateFrom,
        ?string $dateTo,
        ?int $page,
        ?int $perPage
    ) : LengthAwarePaginator;

    /**
     * This method provides updating existing row
     * with an eloquent model
     *
     * @param UserWalletTransactionLog $userWalletTransactionLog
     * @param UserBalanceTypeListItem|null $userBalanceTypeListItem
     * @param int|null $authId
     * @param string|null $template
     * @param array|null $data
     * @param float|null $amount
     * @param float|null $pendingBalance
     * @param float|null $balance
     *
     * @return UserWalletTransactionLog
     */
    public function update(
        UserWalletTransactionLog $userWalletTransactionLog,
        ?UserBalanceTypeListItem $userBalanceTypeListItem,
        ?int $authId,
        ?string $template,
        ?array $data,
        ?float $amount,
        ?float $pendingBalance,
        ?float $balance
    ) : UserWalletTransactionLog;

    /**
     * This method provides creating a new row
     * with an eloquent model
     *
     * @param int $authId
     * @param UserBalanceTypeListItem $userBalanceTypeListItem
     * @param string $template
     * @param array $data
     * @param float|null $amount
     * @param float|null $pendingBalance
     * @param float|null $balance
     *
     * @return UserWalletTransactionLog|null
     */
    public function store(
        UserBalanceTypeListItem $userBalanceTypeListItem,
        int $authId,
        string $template,
        array $data,
        ?float $amount,
        ?float $pendingBalance,
        ?float $balance
    ) : ?UserWalletTransactionLog;

    /**
     * This method provides deleting existing row
     * with an eloquent model
     *
     * @param UserWalletTransactionLog $userWalletTransactionLog
     *
     * @return bool
     */
    public function delete(
        UserWalletTransactionLog $userWalletTransactionLog
    ) : bool;
}
