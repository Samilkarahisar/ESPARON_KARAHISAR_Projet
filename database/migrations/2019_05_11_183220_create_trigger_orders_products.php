<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerOrdersProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER after_delete_orders_products AFTER DELETE ON `orders_products` FOR EACH ROW 
            BEGIN
                UPDATE orders SET total = total - ROUND(OLD.quantity * (SELECT price FROM products WHERE id = OLD.product_id), 2) WHERE id = OLD.order_id;
            END
        ');
        DB::unprepared('
        CREATE TRIGGER after_insert_orders_products AFTER INSERT ON `orders_products` FOR EACH ROW 
            BEGIN
                UPDATE orders SET total = total + ROUND(NEW.quantity * (SELECT price FROM products WHERE id = NEW.product_id), 2) WHERE id = NEW.order_id;
            END
        ');
        DB::unprepared('
        CREATE TRIGGER after_update_orders_products AFTER UPDATE ON `orders_products` FOR EACH ROW 
        BEGIN
            UPDATE orders SET total = total + ROUND((NEW.quantity - OLD.quantity) * (SELECT price FROM products WHERE id = NEW.product_id), 2) WHERE id = NEW.order_id;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `after_delete_orders_products`');
        DB::unprepared('DROP TRIGGER `after_insert_orders_products`');
        DB::unprepared('DROP TRIGGER `after_update_orders_products`');
    }

}
