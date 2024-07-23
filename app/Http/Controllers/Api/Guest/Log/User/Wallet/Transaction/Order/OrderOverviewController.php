<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Order;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Order\Interfaces\OrderOverviewControllerInterface;
use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Order\Overview\StoreRequest;
use App\Lists\Log\User\Wallet\Transaction\Order\Overview\OrderOverviewLogList;
use App\Lists\User\Balance\Type\UserBalanceTypeList;
use App\Repositories\Log\User\Wallet\UserWalletTransactionLogRepository;
use App\Transformers\Api\Guest\Log\User\Wallet\Transaction\UserWalletTransactionLogTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class OrderOverviewController
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Order
 */
final class OrderOverviewController extends BaseController implements OrderOverviewControllerInterface
{
    /**
     * @var UserWalletTransactionLogRepository
     */
    protected UserWalletTransactionLogRepository $userWalletTransactionLogRepository;

    /**
     * OrderOverviewController constructor
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
         * Getting order overview log
         */
        $orderOverviewLogListItem = OrderOverviewLogList::getItemByCode(
            $request->input('code')
        );

        /**
         * Checking order overview log existence
         */
        if (!$orderOverviewLogListItem) {
            return $this->respondWithError(
                trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.result.error.find.orderOverviewLog')
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
                trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.result.error.find.userBalanceType')
            );
        }

        /**
         * Creating user wallet transaction log
         */
        $userWalletTransactionLog = $this->userWalletTransactionLogRepository->store(
            $userBalanceTypeListItem,
            $id,
            $orderOverviewLogListItem->name,
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
                trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.result.error.create')
            );
        }

        return $this->respondWithSuccess(
            $this->transformItem($userWalletTransactionLog, new UserWalletTransactionLogTransformer),
            trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.result.success')
        );
    }
}
