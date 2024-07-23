<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\User\Interfaces;

use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\User\IndexRequest;
use Illuminate\Http\JsonResponse;

/**
 * Interface UserTransactionControllerInterface
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\User\Interfaces
 */
interface UserTransactionControllerInterface
{
    /**
     * This method provides getting data
     *
     * @param int $id
     * @param IndexRequest $request
     *
     * @return JsonResponse
     */
    public function index(
        int $id,
        IndexRequest $request
    ) : JsonResponse;
}
