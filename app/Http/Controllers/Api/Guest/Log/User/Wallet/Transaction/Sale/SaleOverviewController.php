<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Sale;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Sale\Interfaces\SaleOverviewControllerInterface;
use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Sale\Overview\StoreRequest;
use App\Lists\Log\User\Wallet\Transaction\Sale\Overview\SaleOverviewLogList;
use App\Lists\User\Balance\Type\UserBalanceTypeList;
use App\Repositories\Log\User\Wallet\UserWalletTransactionLogRepository;
use App\Transformers\Api\Guest\Log\User\Wallet\Transaction\UserWalletTransactionLogTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class SaleOverviewController
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Sale
 */
final class SaleOverviewController extends BaseController implements SaleOverviewControllerInterface
{
    /**
     * @var UserWalletTransactionLogRepository
     */
    protected UserWalletTransactionLogRepository $userWalletTransactionLogRepository;

    /**
     * SaleOverviewController constructor
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
         * Getting sale overview log
         */
        $saleOverviewLogListItem = SaleOverviewLogList::getItemByCode(
            $request->input('code')
        );

        /**
         * Checking sale overview log existence
         */
        if (!$saleOverviewLogListItem) {
            return $this->respondWithError(
                trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.result.error.find.saleOverviewLog')
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
                trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.result.error.find.userBalanceType')
            );
        }

        /**
         * Creating user wallet transaction log
         */
        $userWalletTransactionLog = $this->userWalletTransactionLogRepository->store(
            $userBalanceTypeListItem,
            $id,
            $saleOverviewLogListItem->name,
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
                trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.result.error.create')
            );
        }

        return $this->respondWithSuccess(
            $this->transformItem($userWalletTransactionLog, new UserWalletTransactionLogTransformer),
            trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.result.success')
        );
    }
}
