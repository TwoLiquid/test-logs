<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Invoice;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Invoice\Interfaces\CreditInvoiceForSellerControllerInterface;
use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Invoice\Seller\Credit\StoreRequest;
use App\Lists\Log\User\Wallet\Transaction\Invoice\Seller\Credit\CreditInvoiceForSellerLogList;
use App\Lists\User\Balance\Type\UserBalanceTypeList;
use App\Repositories\Log\User\Wallet\UserWalletTransactionLogRepository;
use App\Transformers\Api\Guest\Log\User\Wallet\Transaction\UserWalletTransactionLogTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class CreditInvoiceForSellerController
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Invoice
 */
final class CreditInvoiceForSellerController extends BaseController implements CreditInvoiceForSellerControllerInterface
{
    /**
     * @var UserWalletTransactionLogRepository
     */
    protected UserWalletTransactionLogRepository $userWalletTransactionLogRepository;

    /**
     * CreditInvoiceForSellerController constructor
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
         * Getting credit invoice for seller log
         */
        $creditInvoiceForSellerLogListItem = CreditInvoiceForSellerLogList::getItemByCode(
            $request->input('code')
        );

        /**
         * Checking credit invoice for seller log existence
         */
        if (!$creditInvoiceForSellerLogListItem) {
            return $this->respondWithError(
                trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/credit/store.result.error.find.creditInvoiceForSellerLog')
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
                trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/credit/store.result.error.find.userBalanceType')
            );
        }

        /**
         * Creating user wallet transaction log
         */
        $userWalletTransactionLog = $this->userWalletTransactionLogRepository->store(
            $userBalanceTypeListItem,
            $id,
            $creditInvoiceForSellerLogListItem->name,
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
                trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/credit/store.result.error.create')
            );
        }

        return $this->respondWithSuccess(
            $this->transformItem($userWalletTransactionLog, new UserWalletTransactionLogTransformer),
            trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/credit/store.result.success')
        );
    }
}
