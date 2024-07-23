<?php

namespace App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\AddFunds\Receipt;

use App\Http\Requests\Api\BaseRequest;
use App\Lists\Log\User\Wallet\Transaction\AddFunds\Receipt\AddFundsReceiptLogList;

/**
 * Class StoreRequest
 *
 * @package App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\AddFunds\Receipt
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
            'data.receipt'        => 'required|array',
            'data.receipt.id'     => 'required|integer',
            'data.receipt.prefix' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'balance_type_id.required'     => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.balance_type_id.required'),
            'balance_type_id.integer'      => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.balance_type_id.integer'),
            'balance_type_id.between'      => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.balance_type_id.between'),
            'code.required'                => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.code.required'),
            'code.integer'                 => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.code.integer'),
            'code.in'                      => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.code.in'),
            'amount.required'              => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.amount.required'),
            'amount.numeric'               => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.amount.numeric'),
            'pending_balance.numeric'      => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.pending_balance.numeric'),
            'balance.numeric'              => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.balance.numeric'),
            'data.required'                => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.data.required'),
            'data.array'                   => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.data.array'),
            'data.receipt.required'        => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.data.receipt.required'),
            'data.receipt.array'           => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.data.receipt.array'),
            'data.receipt.id.required'     => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.data.receipt.id.required'),
            'data.receipt.id.integer'      => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.data.receipt.id.integer'),
            'data.receipt.prefix.required' => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.data.receipt.prefix.required'),
            'data.receipt.prefix.string'   => trans('validations/api/guest/log/user/wallet/transaction/addFunds/receipt/store.data.receipt.prefix.string')
        ];
    }

    /**
     * @return string
     */
    private function getAvailableCodes() : string
    {
        return implode(',',
            AddFundsReceiptLogList::getAppendedItemsCodes()
        );
    }
}
