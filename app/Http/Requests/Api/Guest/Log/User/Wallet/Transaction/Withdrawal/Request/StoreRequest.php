<?php

namespace App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Withdrawal\Request;

use App\Http\Requests\Api\BaseRequest;
use App\Lists\Log\User\Wallet\Transaction\Withdrawal\Request\WithdrawalRequestLogList;

/**
 * Class StoreRequest
 *
 * @package App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Withdrawal\Request
 */
class StoreRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'balance_type_id'     => 'required|integer|between:1,3',
            'code'                => 'required|string|in:' . $this->getAvailableCodes(),
            'amount'              => 'required|numeric',
            'pending_balance'     => 'numeric|nullable',
            'balance'             => 'numeric|nullable',
            'data'                => 'required|array',
            'data.request'        => 'required|array',
            'data.request.id'     => 'required|string',
            'data.request.prefix' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'balance_type_id.required'     => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.balance_type_id.required'),
            'balance_type_id.integer'      => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.balance_type_id.integer'),
            'balance_type_id.between'      => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.balance_type_id.between'),
            'code.required'                => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.code.required'),
            'code.string'                  => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.code.string'),
            'code.in'                      => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.code.in'),
            'amount.required'              => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.amount.required'),
            'amount.numeric'               => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.amount.numeric'),
            'pending_balance.numeric'      => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.pending_balance.numeric'),
            'balance.numeric'              => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.balance.numeric'),
            'data.required'                => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.data.required'),
            'data.array'                   => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.data.array'),
            'data.request.required'        => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.data.request.required'),
            'data.request.array'           => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.data.request.array'),
            'data.request.id.required'     => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.data.request.id.required'),
            'data.request.id.string'       => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.data.request.id.string'),
            'data.request.prefix.required' => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.data.request.prefix.required'),
            'data.request.prefix.string'   => trans('validations/api/guest/log/user/wallet/transaction/withdrawal/request/store.data.request.prefix.string')
        ];
    }

    /**
     * @return string
     */
    private function getAvailableCodes() : string
    {
        return implode(',',
            WithdrawalRequestLogList::getAppendedItemsCodes()
        );
    }
}
