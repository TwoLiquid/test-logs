<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Order;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Order\Interfaces\OrderItemControllerInterface;
use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Order\Item\StoreRequest;
use App\Lists\Log\User\Wallet\Transaction\Order\Item\OrderItemLogList;
use App\Lists\User\Balance\Type\UserBalanceTypeList;
use App\Repositories\Log\User\Wallet\UserWalletTransactionLogRepository;
use App\Transformers\Api\Guest\Log\User\Wallet\Transaction\UserWalletTransactionLogTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class OrderItemController
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Order
 */
final class OrderItemController extends BaseController implements OrderItemControllerInterface
{
    /**
     * @var UserWalletTransactionLogRepository
     */
    protected UserWalletTransactionLogRepository $userWalletTransactionLogRepository;

    /**
     * OrderItemController constructor
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
         * Getting order item log
         */
        $orderItemLogListItem = OrderItemLogList::getItemByCode(
            $request->input('code')
        );

        /**
         * Checking order item log existence
         */
        if (!$orderItemLogListItem) {
            return $this->respondWithError(
                trans('validations/api/guest/log/user/wallet/transaction/order/item/store.result.error.find.orderItemLog')
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
                trans('validations/api/guest/log/user/wallet/transaction/order/item/store.result.error.find.userBalanceType')
            );
        }

        /**
         * Creating user wallet transaction log
         */
        $userWalletTransactionLog = $this->userWalletTransactionLogRepository->store(
            $userBalanceTypeListItem,
            $id,
            $orderItemLogListItem->name,
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
                trans('validations/api/guest/log/user/wallet/transaction/order/item/store.result.error.create')
            );
        }

        return $this->respondWithSuccess(
            $this->transformItem($userWalletTransactionLog, new UserWalletTransactionLogTransformer),
            trans('validations/api/guest/log/user/wallet/transaction/order/item/store.result.success')
        );
    }
}
