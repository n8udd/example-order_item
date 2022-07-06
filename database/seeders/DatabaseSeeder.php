<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO `accounts` (`id`, `name`, `created_at`, `updated_at`) VALUES
            (1, 'Smith\'s Joinery', '2022-07-06 11:30:33', '2022-07-06 11:30:33'),
            (2, 'Linda\'s Cafe', '2022-07-06 11:30:33', '2022-07-06 11:30:33'),
            (3, 'Make the most', '2022-07-06 11:30:33', '2022-07-06 11:30:33'),
            (4, 'London Fisheries', '2022-07-06 11:30:33', '2022-07-06 11:30:33');
        ");

        DB::insert("
            INSERT INTO `items` (`id`, `name`, `alias`, `size`, `created_at`, `updated_at`) VALUES
            (1, 't_shirt', 'T-Shirt', 'small', '2022-07-06 11:32:25', '2022-07-06 11:32:25'),
            (2, 'overalls', 'Washable Overalls', 'small', '2022-07-06 11:32:25', '2022-07-06 11:32:25'),
            (3, 'shorts', 'Knee Length Shorts', 'small', '2022-07-06 11:32:25', '2022-07-06 11:32:25'),
            (4, 't_shirt', 'T-Shirt', 'medium', '2022-07-06 11:32:25', '2022-07-06 11:32:25'),
            (5, 'overalls', 'Washable Overalls', 'medium', '2022-07-06 11:32:25', '2022-07-06 11:32:25'),
            (6, 'shorts', 'Knee Length Shorts', 'medium', '2022-07-06 11:32:25', '2022-07-06 11:32:25'),
            (7, 't_shirt', 'T-Shirt', 'large', '2022-07-06 11:32:25', '2022-07-06 11:32:25'),
            (8, 'overalls', 'Washable Overalls', 'large', '2022-07-06 11:32:25', '2022-07-06 11:32:25'),
            (9, 'shorts', 'Knee Length Shorts', 'large', '2022-07-06 11:32:25', '2022-07-06 11:32:25'),
            (10, 't_shirt', 'T-Shirt', 'x-large', '2022-07-06 11:32:25', '2022-07-06 11:32:25'),
            (11, 'overalls', 'Washable Overalls', 'x-large', '2022-07-06 11:32:25', '2022-07-06 11:32:25'),
            (12, 'shorts', 'Knee Length Shorts', 'x-large', '2022-07-06 11:32:25', '2022-07-06 11:32:25');
        ");

        DB::insert("
            INSERT INTO `orders` (`id`, `account_id`, `shipping_name`, `shipping_address`, `ordered_on`, `payment_received_on`, `shipped_on`, `created_at`, `updated_at`) VALUES
            (1, 1, 'Ken Adams', '123 Redhill, London...', '2022-07-06 11:31:42', '2022-07-06 11:31:42', '2022-07-06 11:31:42', '2022-07-06 11:31:42', '2022-07-06 11:31:42'),
            (2, 2, 'Linda Redwood', '123 Baker St, Manchester...', '2022-07-06 11:31:42', '2022-07-06 11:31:42', '2022-07-06 11:31:42', '2022-07-06 11:31:42', '2022-07-06 11:31:42'),
            (3, 2, 'Lisa Redwood', '4 Edminton Road, Bristol...', '2022-07-06 11:31:42', '2022-07-06 11:31:42', '2022-07-06 11:31:42', '2022-07-06 11:31:42', '2022-07-06 11:31:42');
        ");

        DB::insert("
            INSERT INTO `item_order` (`id`, `item_id`, `order_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
            (3, 10, 1, 4, 12, '2022-07-06 11:39:43', '2022-07-06 11:39:43'),
            (4, 5, 1, 2, 6, '2022-07-06 11:39:43', '2022-07-06 11:39:43'),
            (5, 2, 1, 1, 11, '2022-07-06 11:39:43', '2022-07-06 11:39:43'),
            (6, 1, 2, 1, 2, '2022-07-06 11:39:43', '2022-07-06 11:39:43'),
            (7, 4, 3, 12, 10, '2022-07-06 11:39:43', '2022-07-06 11:39:43'),
            (8, 2, 3, 1, 100, '2022-07-06 11:39:43', '2022-07-06 11:39:43');
        ");
    }
}
