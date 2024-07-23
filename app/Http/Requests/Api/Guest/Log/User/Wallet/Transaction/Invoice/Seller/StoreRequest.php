<?php

namespace App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Invoice\Seller;

use App\Http\Requests\Api\BaseRequest;
use App\Lists\Log\User\Wallet\Transaction\Invoice\Seller\InvoiceForSellerLogList;

/**
 * Class StoreRequest
 *
 * @package App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\Invoice\Seller
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
            'data.invoice'        => 'required|array',
            'data.invoice.id'     => 'required|integer',
            'data.invoice.prefix' => 'required|string',
            'data.sale'           => 'required|array',
            'data.sale.id'        => 'required|integer',
            'data.sale.prefix'    => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'balance_type_id.required'     => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.balance_type_id.required'),
            'balance_type_id.integer'      => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.balance_type_id.integer'),
            'balance_type_id.between'      => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.balance_type_id.between'),
            'code.required'                => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.code.required'),
            'code.string'                  => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.code.string'),
            'code.in'                      => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.code.in'),
            'amount.required'              => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.amount.required'),
            'amount.numeric'               => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.amount.numeric'),
            'pending_balance.numeric'      => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.pending_balance.numeric'),
            'balance.numeric'              => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.balance.numeric'),
            'data.required'                => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.required'),
            'data.array'                   => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.array'),
            'data.invoice.required'        => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.invoice.required'),
            'data.invoice.array'           => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.invoice.array'),
            'data.invoice.id.required'     => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.invoice.id.required'),
            'data.invoice.id.integer'      => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.invoice.id.integer'),
            'data.invoice.prefix.required' => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.invoice.prefix.required'),
            'data.invoice.prefix.string'   => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.invoice.prefix.string'),
            'data.sale.required'           => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.sale.required'),
            'data.sale.array'              => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.sale.array'),
            'data.sale.id.required'        => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.sale.id.required'),
            'data.sale.id.integer'         => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.sale.id.integer'),
            'data.sale.prefix.required'    => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.sale.prefix.required'),
            'data.sale.prefix.string'      => trans('validations/api/guest/log/user/wallet/transaction/invoice/seller/store.data.sale.prefix.string')
        ];
    }

    /**
     * @return string
     */
    private function getAvailableCodes() : string
    {
        return implode(',',
            InvoiceForSellerLogList::getAppendedItemsCodes()
        );
    }
}
