<?php

namespace App\Models\MongoDb;

use App\Lists\User\Balance\Type\UserBalanceTypeList;
use App\Lists\User\Balance\Type\UserBalanceTypeListItem;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use MongoDB\Laravel\Eloquent\Model;

/**
 * App\Models\MongoDb\UserWalletTransactionLog
 *
 * @property string $_id
 * @property int $auth_id
 * @property int $balance_type_id
 * @property double $amount
 * @property double $pending_balance
 * @property double $balance
 * @property string $template
 * @property array $data
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static Builder|UserWalletTransactionLog find(string $id)
 * @method static Builder|UserWalletTransactionLog query()
 */
class UserWalletTransactionLog extends Model
{
    /**
     * Database connection type
     *
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * Database collection name
     *
     * @var string
     */
    protected $collection = 'user_wallet_transaction_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'auth_id', 'balance_type_id', 'amount', 'pending_balance', 'balance', 'template', 'data'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array'
    ];

    //--------------------------------------------------------------------------
    // Lists accessors

    /**
     * @return UserBalanceTypeListItem|null
     */
    public function getBalanceType() : ?UserBalanceTypeListItem
    {
        return UserBalanceTypeList::getItem(
            $this->balance_type_id
        );
    }
}
