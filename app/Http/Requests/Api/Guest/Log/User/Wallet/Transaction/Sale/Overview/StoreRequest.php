<?php

namespace App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Sale\Overview;

use App\Http\Requests\Api\BaseRequest;
use App\Lists\Log\User\Wallet\Transaction\Sale\Overview\SaleOverviewLogList;

/**
 * Class StoreRequest
 *
 * @package App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Sale\Overview
 */
class StoreRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'balance_type_id'  => 'required|integer|between:1,3',
            'code'             => 'required|string|in:' . $this->getAvailableCodes(),
            'amount'           => 'required|numeric',
            'pending_balance'  => 'numeric|nullable',
            'balance'          => 'numeric|nullable',
            'data'             => 'required|array',
            'data.sale'        => 'required|array',
            'data.sale.id'     => 'required|integer',
            'data.sale.prefix' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'balance_type_id.required'  => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.balance_type_id.required'),
            'balance_type_id.integer'   => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.balance_type_id.integer'),
            'balance_type_id.between'   => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.balance_type_id.between'),
            'code.required'             => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.code.required'),
            'code.string'               => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.code.string'),
            'code.in'                   => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.code.in'),
            'amount.required'           => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.amount.required'),
            'amount.numeric'            => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.amount.numeric'),
            'pending_balance.numeric'   => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.pending_balance.numeric'),
            'balance.numeric'           => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.balance.numeric'),
            'data.required'             => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.data.required'),
            'data.array'                => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.data.array'),
            'data.sale.required'        => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.data.sale.required'),
            'data.sale.array'           => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.data.sale.array'),
            'data.sale.id.required'     => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.data.sale.id.required'),
            'data.sale.id.integer'      => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.data.sale.id.integer'),
            'data.sale.prefix.required' => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.data.sale.prefix.required'),
            'data.sale.prefix.string'   => trans('validations/api/guest/log/user/wallet/transaction/sale/overview/store.data.sale.prefix.string')
        ];
    }

    /**
     * @return string
     */
    private function getAvailableCodes() : string
    {
        return implode(',',
            SaleOverviewLogList::getAppendedItemsCodes()
        );
    }
}
