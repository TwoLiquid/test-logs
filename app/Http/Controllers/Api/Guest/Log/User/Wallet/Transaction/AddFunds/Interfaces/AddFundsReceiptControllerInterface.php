<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\AddFunds\Interfaces;

use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\AddFunds\Receipt\StoreRequest;
use Illuminate\Http\JsonResponse;

/**
 * Interface AddFundsReceiptControllerInterface
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\AddFunds\Interfaces
 */
interface AddFundsReceiptControllerInterface
{
    /**
     * This method provides storing data
     *
     * @param int $id
     * @param StoreRequest $request
     *
     * @return JsonResponse
     */
    public function store(
        int $id,
        StoreRequest $request
    ) : JsonResponse;
}
