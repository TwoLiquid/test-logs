<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Invoice;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Invoice\Interfaces\InvoiceForBuyerControllerInterface;
use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Invoice\Buyer\StoreRequest;
use App\Lists\Log\User\Wallet\Transaction\Invoice\Buyer\InvoiceForBuyerLogList;
use App\Lists\User\Balance\Type\UserBalanceTypeList;
use App\Repositories\Log\User\Wallet\UserWalletTransactionLogRepository;
use App\Transformers\Api\Guest\Log\User\Wallet\Transaction\UserWalletTransactionLogTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class InvoiceForBuyerController
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Invoice
 */
final class InvoiceForBuyerController extends BaseController implements InvoiceForBuyerControllerInterface
{
    /**
     * @var UserWalletTransactionLogRepository
     */
    protected UserWalletTransactionLogRepository $userWalletTransactionLogRepository;

    /**
     * InvoiceForBuyerController constructor
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
         * Getting invoice for buyer log
         */
        $invoiceForBuyerLogListItem = InvoiceForBuyerLogList::getItemByCode(
            $request->input('code')
        );

        /**
         * Checking invoice for buyer log existence
         */
        if (!$invoiceForBuyerLogListItem) {
            return $this->respondWithError(
                trans('validations/api/guest/log/user/wallet/transaction/invoice/buyer/store.result.error.find.invoiceForBuyerLog')
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
                trans('validations/api/guest/log/user/wallet/transaction/invoice/buyer/store.result.error.find.userBalanceType')
            );
        }

        /**
         * Creating user wallet transaction log
         */
        $userWalletTransactionLog = $this->userWalletTransactionLogRepository->store(
            $userBalanceTypeListItem,
            $id,
            $invoiceForBuyerLogListItem->name,
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
                trans('validations/api/guest/log/user/wallet/transaction/invoice/buyer/store.result.error.create')
            );
        }

        return $this->respondWithSuccess(
            $this->transformItem($userWalletTransactionLog, new UserWalletTransactionLogTransformer),
            trans('validations/api/guest/log/user/wallet/transaction/invoice/buyer/store.result.success')
        );
    }
}
