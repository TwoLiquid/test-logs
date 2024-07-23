<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint;

/**
 * Running MongoDB migration
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::connection('mongodb')->table('user_wallet_transaction_logs', function (Blueprint $collection) {
            $collection->id();
            $collection->bigInteger('auth_id')->index();
            $collection->integer('balance_type_id')->index();
            $collection->double('amount');
            $collection->double('pending_balance')->nullable();
            $collection->double('balance');
            $collection->longText('template');
            $collection->json('data')->nullable();
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::connection('mongodb')->table('user_wallet_transaction_logs', function (Blueprint $collection) {
            $collection->drop();
        });
    }
};
