<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Withdrawal\Interfaces;

use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Withdrawal\Request\StoreRequest;
use Illuminate\Http\JsonResponse;

/**
 * Interface WithdrawalRequestControllerInterface
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Withdrawal\Interfaces
 */
interface WithdrawalRequestControllerInterface
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
