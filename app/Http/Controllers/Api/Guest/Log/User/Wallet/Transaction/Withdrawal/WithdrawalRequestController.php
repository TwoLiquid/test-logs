<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Withdrawal;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Withdrawal\Interfaces\WithdrawalRequestControllerInterface;
use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Withdrawal\Request\StoreRequest;
use App\Lists\Log\User\Wallet\Transaction\Withdrawal\Request\WithdrawalRequestLogList;
use App\Lists\User\Balance\Type\UserBalanceTypeList;
use App\Repositories\Log\User\Wallet\UserWalletTransactionLogRepository;
use App\Transformers\Api\Guest\Log\User\Wallet\Transaction\UserWalletTransactionLogTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class WithdrawalRequestController
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Withdrawal
 */
final class WithdrawalRequestController extends BaseController implements WithdrawalRequestControllerInterface
{
    /**
     * @var UserWalletTransactionLogRepository
     */
    protected UserWalletTransactionLogRepository $userWalletTransactionLogRepository;

    /**
     * WithdrawalRequestController constructor
     */
    public function __construct()
    {
        /** @var UserWalletTransactionLogRepository userWalletTransactionLogRepository */
        $this->userWalletTransactionLogRepository = new UserWalletTransactionLogRepository();
    }

    /**
     * @param int $id
     * @param StoreRequest $request
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function store(
        int $id,
        StoreRequest $request
    ) : JsonResponse
    {
        /**
         * Getting withdrawal request log
         */
        $withdrawalRequestLogListItem = WithdrawalRequestLogList::getItemByCode(
            $request->input('code')
        );

        /**
         * Checking withdrawal request log existence
         */
        if (!$withdrawalRequestLogListItem) {
            return $this->respondWithError(
                trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.result.error.find.withdrawalReceiptLog')
            );
        }

        /**
         * Getting a user balance type
         */
        $userBalanceTypeListItem = UserBalanceTypeList::getItem(
            $request->input('balance_type_id')
        );

        /**
         * Checking user balance type existence
         */
        if (!$userBalanceTypeListItem) {
            return $this->respondWithError(
                trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.result.error.find.userBalanceType')
            );
        }

        /**
         * Creating user wallet transaction log
         */
        $userWalletTransactionLog = $this->userWalletTransactionLogRepository->store(
            $userBalanceTypeListItem,
            $id,
            $withdrawalRequestLogListItem->name,
            $request->input('data'),
            $request->input('amount'),
            $request->input('pending_balance'),
            $request->input('balance')
        );

        /**
         * Checking user wallet transaction log existence
         */
        if (!$userWalletTransactionLog) {
            return $this->respondWithError(
                trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.result.error.create')
            );
        }

        return $this->respondWithSuccess(
            $this->transformItem($userWalletTransactionLog, new UserWalletTransactionLogTransformer),
            trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.result.success')
        );
    }
}
