<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Sale\Interfaces;

use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Sale\Overview\StoreRequest;
use Illuminate\Http\JsonResponse;

/**
 * Interface SaleOverviewControllerInterface
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Sale\Interfaces
 */
interface SaleOverviewControllerInterface
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
