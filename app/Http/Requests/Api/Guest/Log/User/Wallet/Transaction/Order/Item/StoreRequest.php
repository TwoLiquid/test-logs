<?php

namespace App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Order\Item;

use App\Http\Requests\Api\BaseRequest;
use App\Lists\Log\User\Wallet\Transaction\Order\Item\OrderItemLogList;

/**
 * Class StoreRequest
 *
 * @package App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Order\Item
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
            'data.order.prefix' => 'required|string',
            'data.item'         => 'required|array',
            'data.item.id'      => 'required|integer',
            'data.item.prefix'  => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'balance_type_id.required'   => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.balance_type_id.required'),
            'balance_type_id.integer'    => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.balance_type_id.integer'),
            'balance_type_id.between'    => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.balance_type_id.between'),
            'code.required'              => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.code.required'),
            'code.string'                => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.code.string'),
            'code.in'                    => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.code.in'),
            'amount.required'            => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.amount.required'),
            'amount.numeric'             => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.amount.numeric'),
            'pending_balance.numeric'    => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.pending_balance.numeric'),
            'balance.numeric'            => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.balance.numeric'),
            'data.required'              => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.required'),
            'data.array'                 => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.array'),
            'data.order.required'        => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.order.required'),
            'data.order.array'           => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.order.array'),
            'data.order.id.required'     => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.order.id.required'),
            'data.order.id.integer'      => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.order.id.integer'),
            'data.order.prefix.required' => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.order.prefix.required'),
            'data.order.prefix.string'   => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.order.prefix.string'),
            'data.item.required'         => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.item.required'),
            'data.item.array'            => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.item.array'),
            'data.item.id.required'      => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.item.id.required'),
            'data.item.id.integer'       => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.item.id.integer'),
            'data.item.prefix.required'  => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.item.prefix.required'),
            'data.item.prefix.string'    => trans('validations/api/guest/log/user/wallet/transaction/order/item/store.data.item.prefix.string')
        ];
    }

    /**
     * @return string
     */
    private function getAvailableCodes() : string
    {
        return implode(',',
            OrderItemLogList::getAppendedItemsCodes()
        );
    }
}
