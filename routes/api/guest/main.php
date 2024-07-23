<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api'], function () {

    /**
     * Guest namespace
     */
    Route::group([
        'namespace'  => 'Guest',
        'middleware' => [
            'auth.apikey'
        ]
    ], function () {

        /**
         * Log namespace
         */
        Route::group([
            'namespace' => 'Log',
            'prefix'    => 'log'
        ], function () {

            /**
             * User namespace
             */
            Route::group([
                'namespace' => 'User'
            ], function () {

                /**
                 * Wallet namespace
                 */
                Route::group([
                    'namespace' => 'Wallet'
                ], function () {

                    /**
                     * Transaction namespace
                     */
                    Route::group([
                        'namespace' => 'Transaction'
                    ], function () {

                        /**
                         * Add Funds namespace
                         */
                        Route::group([
                            'namespace' => 'AddFunds'
                        ], function () {

                            /**
                             * Add funds receipt logs create method
                             */
                            Route::post('user/{id}/wallet/transactions/add/funds/receipts', 'AddFundsReceiptController@store')
                                ->name('api.log.user.wallet.transactions.add.funds.receipts.store');
                        });

                        /**
                         * Invoice namespace
                         */
                        Route::group([
                            'namespace' => 'Invoice'
                        ], function () {

                            /**
                             * Invoice for buyer logs create method
                             */
                            Route::post('user/{id}/wallet/transactions/buyer/invoices', 'InvoiceForBuyerController@store')
                                ->name('api.log.user.wallet.transactions.buyer.invoices.store');

                            /**
                             * Invoice for seller logs create method
                             */
                            Route::post('user/{id}/wallet/transactions/seller/invoices', 'InvoiceForSellerController@store')
                                ->name('api.log.user.wallet.transactions.seller.invoices.store');

                            /**
                             * Credit invoice for buyer logs create method
                             */
                            Route::post('user/{id}/wallet/transactions/buyer/credit/invoices', 'CreditInvoiceForBuyerController@store')
                                ->name('api.log.user.wallet.transactions.buyer.credit.invoices.store');

                            /**
                             * Credit invoice for seller logs create method
                             */
                            Route::post('user/{id}/wallet/transactions/seller/credit/invoices', 'CreditInvoiceForSellerController@store')
                                ->name('api.log.user.wallet.transactions.seller.credit.invoices.store');

                            /**
                             * Tip invoice for buyer logs create method
                             */
                            Route::post('user/{id}/wallet/transactions/buyer/tip/invoices', 'TipInvoiceForBuyerController@store')
                                ->name('api.log.user.wallet.transactions.buyer.tip.invoices.store');

                            /**
                             * Tip invoice for seller logs create method
                             */
                            Route::post('user/{id}/wallet/transactions/seller/tip/invoices', 'TipInvoiceForSellerController@store')
                                ->name('api.log.user.wallet.transactions.seller.tip.invoices.store');
                        });

                        /**
                         * Order namespace
                         */
                        Route::group([
                            'namespace' => 'Order'
                        ], function () {

                            /**
                             * Order overview logs create method
                             */
                            Route::post('user/{id}/wallet/transactions/order/overviews', 'OrderOverviewController@store')
                                ->name('api.log.user.wallet.transactions.order.overviews.store');

                            /**
                             * Order order item logs create method
                             */
                            Route::post('user/{id}/wallet/transactions/order/items', 'OrderItemController@store')
                                ->name('api.log.user.wallet.transactions.order.items.store');
                        });

                        /**
                         * Sale namespace
                         */
                        Route::group([
                            'namespace' => 'Sale'
                        ], function () {

                            /**
                             * Sale overview logs create method
                             */
                            Route::post('user/{id}/wallet/transactions/sale/overviews', 'SaleOverviewController@store')
                                ->name('api.log.user.wallet.transactions.sale.overviews.store');
                        });

                        /**
                         * User namespace
                         */
                        Route::group([
                            'namespace' => 'User'
                        ], function () {

                            /**
                             * User transaction logs getting method
                             */
                            Route::get('user/{id}/wallet/transactions', 'UserTransactionController@index')
                                ->name('api.log.user.wallet.transactions.index');
                        });

                        /**
                         * Withdrawal namespace
                         */
                        Route::group([
                            'namespace' => 'Withdrawal'
                        ], function () {

                            /**
                             * Withdrawal request logs create method
                             */
                            Route::post('user/{id}/wallet/transactions/withdrawal/requests', 'WithdrawalRequestController@store')
                                ->name('api.log.user.wallet.transactions.withdrawal.requests.store');

                            /**
                             * Withdrawal receipt logs create method
                             */
                            Route::post('user/{id}/wallet/transactions/withdrawal/receipts', 'WithdrawalReceiptController@store')
                                ->name('api.log.user.wallet.transactions.withdrawal.receipts.store');
                        });
                    });
                });
            });
        });
    });
});
