<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\User;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\User\Interfaces\UserTransactionControllerInterface;
use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\User\IndexRequest;
use App\Lists\User\Balance\Type\UserBalanceTypeList;
use App\Repositories\Log\User\Wallet\UserWalletTransactionLogRepository;
use App\Transformers\Api\Guest\Log\User\Wallet\Transaction\UserWalletTransactionLogTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class UserTransactionController
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\User
 */
final class UserTransactionController extends BaseController implements UserTransactionControllerInterface
{
    /**
     * @var UserWalletTransactionLogRepository
     */
    protected UserWalletTransactionLogRepository $userWalletTransactionLogRepository;

    /**
     * UserTransactionController constructor
     */
    public function __construct()
    {
        /** @var UserWalletTransactionLogRepository userWalletTransactionLogRepository */
        $this->userWalletTransactionLogRepository = new UserWalletTransactionLogRepository();
    }

    /**
     * @param int $id
     * @param IndexRequest $request
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function index(
        int $id,
        IndexRequest $request
    ) : JsonResponse
    {
        /**
         * Getting a user balance type
         */
        $userBalanceTypeListItem = UserBalanceTypeList::getItem(
            $request->input('balance_type_id')
        );

        /**
         * Getting user wallet transaction logs
         */
        $userWalletTransactionLogs = $this->userWalletTransactionLogRepository->getAllByAuthIdPaginated(
            $id,
            $request->input('search'),
            $userBalanceTypeListItem,
            $request->input('date_from'),
            $request->input('date_to'),
            $request->input('page'),
            $request->input('per_page')
        );

        return $this->setPagination($userWalletTransactionLogs)->respondWithSuccess(
            $this->transformCollection($userWalletTransactionLogs, new UserWalletTransactionLogTransformer),
            trans('validations/api/guest/log/user/wallet/transaction/user/index.result.success')
        );
    }
}
