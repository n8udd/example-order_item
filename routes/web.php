<?php

use App\Models\Order;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test_sql', function () {
    $o = Order::with('items')->first();
    dd($o->grandTotal()->toSql());

    /**
     * SELECT
     * 	sum(item_order.quantity * item_order.unit_price) AS total
     * FROM
     * 	`items`
     * 	INNER JOIN `item_order` ON `items`.`id` = `item_order`.`item_id`
     * WHERE
     * 	`item_order`.`order_id` = 1
     * GROUP BY
     * 	item_order.order_id
     */

    // RESULT = 71
});

Route::get('/test_get', function () {
    $o = Order::with('items')->first();
    dd($o->grandTotal()->get());

    /**
     * SELECT
     * 	sum(item_order.quantity * item_order.unit_price) AS total,
     * 	`item_order`.`order_id` AS `pivot_order_id`,
     * 	`item_order`.`item_id` AS `pivot_item_id`
     * FROM
     * 	`items`
     * 	INNER JOIN `item_order` ON `items`.`id` = `item_order`.`item_id`
     * WHERE
     * 	`item_order`.`order_id` = 1
     * GROUP BY
     * 	`item_order`.`order_id`
     */

    // RESULT = Illuminate\Database\QueryException with message 'SQLSTATE[42000]: Syntax error or access violation: 1055 Expression #3 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'example_order_item.item_order.item_id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by (SQL: select sum(item_order.quantity * item_order.unit_price) as total, `item_order`.`order_id` as `pivot_order_id`, `item_order`.`item_id` as `pivot_item_id` from `items` inner join `item_order` on `items`.`id` = `item_order`.`item_id` where `item_order`.`order_id` = 1 group by `item_order`.`order_id`)'
});
