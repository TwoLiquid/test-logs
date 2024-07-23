<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\AddFunds;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\AddFunds\Interfaces\AddFundsReceiptControllerInterface;
use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\AddFunds\Receipt\StoreRequest;
use App\Lists\Log\User\Wallet\Transaction\AddFunds\Receipt\AddFundsReceiptLogList;
use App\Lists\User\Balance\Type\UserBalanceTypeList;
use App\Repositories\Log\User\Wallet\UserWalletTransactionLogRepository;
use App\Transformers\Api\Guest\Log\User\Wallet\Transaction\UserWalletTransactionLogTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class AddFundsReceiptController
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\AddFunds
 */
final class AddFundsReceiptController extends BaseController implements AddFundsReceiptControllerInterface
{
    /**
     * @var UserWalletTransactionLogRepository
     */
    protected UserWalletTransactionLogRepository $userWalletTransactionLogRepository;

    /**
     * AddFundsReceiptController constructor
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
         * Getting add funds receipt log
         */
        $addFundsReceiptLogListItem = AddFundsReceiptLogList::getItemByCode(
            $request->input('code')
        );

        /**
         * Checking add funds receipt log existence
         */
        if (!$addFundsReceiptLogListItem) {
            return $this->respondWithError(
                trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.result.error.find.addFundsReceiptLog')
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
                trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.result.error.find.userBalanceType')
            );
        }

        /**
         * Creating user wallet transaction log
         */
        $userWalletTransactionLog = $this->userWalletTransactionLogRepository->store(
            $userBalanceTypeListItem,
            $id,
            $addFundsReceiptLogListItem->name,
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
                trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.result.error.create')
            );
        }

        return $this->respondWithSuccess(
            $this->transformItem($userWalletTransactionLog, new UserWalletTransactionLogTransformer),
            trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.result.success')
        );
    }
}
