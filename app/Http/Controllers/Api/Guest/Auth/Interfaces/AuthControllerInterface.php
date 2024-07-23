<?php

namespace App\Http\Controllers\Api\Guest\Auth\Interfaces;

use Illuminate\Http\JsonResponse;

/**
 * Interface AuthControllerInterface
 *
 * @package App\Http\Controllers\Api\Guest\Auth\Interfaces
 */
interface AuthControllerInterface
{
    /**
     * This method provides storing data
     *
     * @return JsonResponse
     */
    public function test() : JsonResponse;
}
