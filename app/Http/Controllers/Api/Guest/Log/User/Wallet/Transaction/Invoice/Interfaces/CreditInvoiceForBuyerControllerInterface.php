<?php

namespace App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Invoice\Interfaces;

use App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Invoice\Buyer\Credit\StoreRequest;
use Illuminate\Http\JsonResponse;

/**
 * Interface CreditInvoiceForBuyerControllerInterface
 *
 * @package App\Http\Controllers\Api\Guest\Log\User\Wallet\Transaction\Invoice\Interfaces
 */
interface CreditInvoiceForBuyerControllerInterface
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
