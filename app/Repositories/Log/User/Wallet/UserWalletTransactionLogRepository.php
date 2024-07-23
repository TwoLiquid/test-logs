<?php

namespace App\Repositories\Log\User\Wallet;

use App\Exceptions\DatabaseException;
use App\Lists\User\Balance\Type\UserBalanceTypeListItem;
use App\Models\MongoDb\UserWalletTransactionLog;
use App\Repositories\BaseRepository;
use App\Repositories\Log\User\Wallet\Interfaces\UserWalletTransactionLogRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Exception;

/**
 * Class UserWalletTransactionLogRepository
 *
 * @package App\Repositories\User\Wallet
 */
class UserWalletTransactionLogRepository extends BaseRepository implements UserWalletTransactionLogRepositoryInterface
{
    /**
     * UserWalletTransactionLogRepository constructor
     */
    public function __construct()
    {
        $this->perPage = config('repositories.userWalletTransactionLog.perPage');
    }

    /**
     * @param int|null $id
     *
     * @return UserWalletTransactionLog|null
     *
     * @throws DatabaseException
     */
    public function findById(
        ?int $id
    ) : ?UserWalletTransactionLog
    {
        try {
            return UserWalletTransactionLog::query()
                ->find($id);
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/log/user/userWalletTransactionLog.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @return Collection
     *
     * @throws DatabaseException
     */
    public function getAll() : Collection
    {
        try {
            return UserWalletTransactionLog::query()
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/log/user/userWalletTransactionLog.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param int|null $page
     * @param int|null $perPage
     *
     * @return LengthAwarePaginator
     *
     * @throws DatabaseException
     */
    public function getAllPaginated(
        ?int $page = null,
        ?int $perPage = null
    ) : LengthAwarePaginator
    {
        try {
            return UserWalletTransactionLog::query()
                ->orderBy('id', 'desc')
                ->paginate($perPage ?: $this->perPage, ['*'], 'page', $page);
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/log/user/userWalletTransactionLog.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param int $authId
     * @param string|null $search
     * @param UserBalanceTypeListItem|null $userBalanceTypeListItem
     * @param string|null $dateFrom
     * @param string|null $dateTo
     * @param int|null $page
     * @param int|null $perPage
     *
     * @return LengthAwarePaginator
     *
     * @throws DatabaseException
     */
    public function getAllByAuthIdPaginated(
        int $authId,
        ?string $search = null,
        ?UserBalanceTypeListItem $userBalanceTypeListItem = null,
        ?string $dateFrom = null,
        ?string $dateTo = null,
        ?int $page = null,
        ?int $perPage = null
    ) : LengthAwarePaginator
    {
        try {
            return UserWalletTransactionLog::query()
                ->when($search, function ($query) use ($search) {
                    $query->where('template', 'LIKE', '%' . $search . '%')
                        ->orWhere('data', 'LIKE', '%' . $search . '%');
                })
                ->when($userBalanceTypeListItem, function ($query) use ($userBalanceTypeListItem) {
                    $query->where('balance_type_id', '=', $userBalanceTypeListItem->id);
                })
                ->when($dateFrom, function ($query) use ($dateFrom) {
                    $query->where('created_at', '>=', Carbon::parse($dateFrom));
                })
                ->when($dateTo, function ($query) use ($dateTo) {
                    $query->where('created_at', '<=', Carbon::parse($dateTo));
                })
                ->where('auth_id', '=', $authId)
                ->orderBy('id', 'desc')
                ->paginate(
                    $perPage ?: $this->perPage, ['*'],
                    'page',
                    $page ?: $this->defaultPage
                );
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/log/user/userWalletTransactionLog.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param UserBalanceTypeListItem $userBalanceTypeListItem
     * @param int $authId
     * @param string $template
     * @param array $data
     * @param float|null $amount
     * @param float|null $pendingBalance
     * @param float|null $balance
     *
     * @return UserWalletTransactionLog|null
     *
     * @throws DatabaseException
     */
    public function store(
        UserBalanceTypeListItem $userBalanceTypeListItem,
        int $authId,
        string $template,
        array $data,
        ?float $amount,
        ?float $pendingBalance,
        ?float $balance
    ) : ?UserWalletTransactionLog
    {
        try {
            return UserWalletTransactionLog::query()->create([
                'balance_type_id' => $userBalanceTypeListItem->id,
                'auth_id'         => $authId,
                'template'        => $template,
                'data'            => $data,
                'amount'          => $amount,
                'pending_balance' => $pendingBalance,
                'balance'         => $balance
            ]);
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/log/user/userWalletTransactionLog.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
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
     *
     * @throws DatabaseException
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
    ) : UserWalletTransactionLog
    {
        try {
            $userWalletTransactionLog->update([
                'balance_type_id' => $userBalanceTypeListItem ? $userBalanceTypeListItem->id : $userWalletTransactionLog->balance_type_id,
                'auth_id'         => $authId ?: $userWalletTransactionLog->auth_id,
                'template'        => $template ?: $userWalletTransactionLog->template,
                'data'            => $data ?: $userWalletTransactionLog->data,
                'amount'          => $amount ?: $userWalletTransactionLog->amount,
                'pending_balance' => $pendingBalance ?: $userWalletTransactionLog->pending_balance,
                'balance'         => $balance ?: $userWalletTransactionLog->balance
            ]);

            return $userWalletTransactionLog;
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/log/user/userWalletTransactionLog.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param UserWalletTransactionLog $userWalletTransactionLog
     *
     * @return bool
     *
     * @throws DatabaseException
     */
    public function delete(
        UserWalletTransactionLog $userWalletTransactionLog
    ) : bool
    {
        try {
            return $userWalletTransactionLog->delete();
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/log/user/userWalletTransactionLog.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }
}
