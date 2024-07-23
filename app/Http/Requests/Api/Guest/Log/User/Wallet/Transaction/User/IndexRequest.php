<?php

namespace App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\User;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class IndexRequest
 *
 * @package App\Http\Requests\Api\Guest\Log\User\Wallet\Transaction\User
 */
class IndexRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'search'          => 'string|nullable',
            'balance_type_id' => 'integer|between:1,3|nullable',
            'date_from'       => 'string|date_format:Y-m-d\TH:i:s.v\Z|nullable',
            'date_to'         => 'string|date_format:Y-m-d\TH:i:s.v\Z|nullable',
            'page'            => 'integer|nullable',
            'per_page'        => 'integer|nullable',
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'search.string'           => trans('validations/api/guest/log/user/wallet/transaction/user/index.search.string'),
            'balance_type_id.integer' => trans('validations/api/guest/log/user/wallet/transaction/user/index.balance_type_id.integer'),
            'balance_type_id.between' => trans('validations/api/guest/log/user/wallet/transaction/user/index.balance_type_id.between'),
            'date_from.string'        => trans('validations/api/guest/log/user/wallet/transaction/user/index.date_from.string'),
            'date_from.date_format'   => trans('validations/api/guest/log/user/wallet/transaction/user/index.date_from.date_format'),
            'date_to.string'          => trans('validations/api/guest/log/user/wallet/transaction/user/index.date_to.string'),
            'date_to.date_format'     => trans('validations/api/guest/log/user/wallet/transaction/user/index.date_to.date_format'),
            'page.integer'            => trans('validations/api/guest/log/user/wallet/transaction/user/index.page.integer'),
            'per_page.integer'        => trans('validations/api/guest/log/user/wallet/transaction/user/index.per_page.integer')
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation() : void
    {
        $params = $this->all();

        $this->merge([
            'balance_type_id' => isset($params['balance_type_id']) ? (int) $params['balance_type_id'] : null,
            'per_page'        => isset($params['per_page']) ? (int) $params['per_page'] : null,
            'page'            => isset($params['page']) ? (int) $params['page'] : null
        ]);
    }

    /**
     * @param null $keys
     *
     * @return array
     */
    public function all($keys = null) : array
    {
        return array_merge(
            parent::all(),
            $this->route()->parameters()
        );
    }
}
