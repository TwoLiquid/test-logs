<?php

namespace App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Order\Overview;

use App\Http\Requests\Api\BaseRequest;
use App\Lists\Log\User\Wallet\Transaction\Order\Overview\OrderOverviewLogList;

/**
 * Class StoreRequest
 *
 * @package App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Order\Overview
 */
class StoreRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'balance_type_id'   => 'required|integer|between:1,3',
            'code'              => 'required|string|in:' . $this->getAvailableCodes(),
            'amount'            => 'required|numeric',
            'pending_balance'   => 'numeric|nullable',
            'balance'           => 'numeric|nullable',
            'data'              => 'required|array',
            'data.order'        => 'required|array',
            'data.order.id'     => 'required|integer',
            'data.order.prefix' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'balance_type_id.required'   => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.balance_type_id.required'),
            'balance_type_id.integer'    => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.balance_type_id.integer'),
            'balance_type_id.between'    => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.balance_type_id.between'),
            'code.required'              => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.code.required'),
            'code.string'                => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.code.string'),
            'code.in'                    => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.code.in'),
            'amount.required'            => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.amount.required'),
            'amount.numeric'             => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.amount.numeric'),
            'pending_balance.numeric'    => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.pending_balance.numeric'),
            'balance.numeric'            => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.balance.numeric'),
            'data.required'              => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.data.required'),
            'data.array'                 => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.data.array'),
            'data.order.required'        => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.data.order.required'),
            'data.order.array'           => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.data.order.array'),
            'data.order.id.required'     => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.data.order.id.required'),
            'data.order.id.integer'      => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.data.order.id.integer'),
            'data.order.prefix.required' => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.data.order.prefix.required'),
            'data.order.prefix.string'   => trans('validations/api/guest/log/user/wallet/transaction/order/overview/store.data.order.prefix.string')
        ];
    }

    /**
     * @return string
     */
    private function getAvailableCodes() : string
    {
        return implode(',',
            OrderOverviewLogList::getAppendedItemsCodes()
        );
    }
}
