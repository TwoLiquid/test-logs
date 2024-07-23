<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Order\Interfaces;

use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Order\Overview\StoreRequest;
use Illuminate\Http\JsonResponse;

/**
 * Interface OrderOverviewControllerInterface
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Order\Interfaces
 */
interface OrderOverviewControllerInterface
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
