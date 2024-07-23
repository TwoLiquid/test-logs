<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Invoice;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Invoice\Interfaces\TipInvoiceForBuyerControllerInterface;
use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Invoice\Buyer\Tip\StoreRequest;
use App\Lists\Log\User\Wallet\Transaction\Invoice\Buyer\Tip\TipInvoiceForBuyerLogList;
use App\Lists\User\Balance\Type\UserBalanceTypeList;
use App\Repositories\Log\User\Wallet\UserWalletTransactionLogRepository;
use App\Transformers\Api\Guest\Log\User\Wallet\Transaction\UserWalletTransactionLogTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class TipInvoiceForBuyerController
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Invoice
 */
final class TipInvoiceForBuyerController extends BaseController implements TipInvoiceForBuyerControllerInterface
{
    /**
     * @var UserWalletTransactionLogRepository
     */
    protected UserWalletTransactionLogRepository $userWalletTransactionLogRepository;

    /**
     * TipInvoiceForBuyerController constructor
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
         * Getting tip invoice for buyer log
         */
        $tipInvoiceForBuyerLogListItem = TipInvoiceForBuyerLogList::getItemByCode(
            $request->input('code')
        );

        /**
         * Checking tip invoice for buyer log existence
         */
        if (!$tipInvoiceForBuyerLogListItem) {
            return $this->respondWithError(
                trans('validations/api/guest/log/user/wallet/transaction/invoice/buyer/tip/store.result.error.find.tipInvoiceForBuyerLog')
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
                trans('validations/api/guest/log/user/wallet/transaction/invoice/buyer/tip/store.result.error.find.userBalanceType')
            );
        }

        /**
         * Creating user wallet transaction log
         */
        $userWalletTransactionLog = $this->userWalletTransactionLogRepository->store(
            $userBalanceTypeListItem,
            $id,
            $tipInvoiceForBuyerLogListItem->name,
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
                trans('validations/api/guest/log/user/wallet/transaction/invoice/buyer/tip/store.result.error.create')
            );
        }

        return $this->respondWithSuccess(
            $this->transformItem($userWalletTransactionLog, new UserWalletTransactionLogTransformer),
            trans('validations/api/guest/log/user/wallet/transaction/invoice/buyer/tip/store.result.success')
        );
    }
}
