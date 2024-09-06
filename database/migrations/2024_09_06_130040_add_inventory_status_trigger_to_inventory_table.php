<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER inventory_status_update
            BEFORE UPDATE ON inventory
            FOR EACH ROW
            BEGIN
                SET NEW.inventory_status = CASE
                    WHEN NEW.quantity <= 10 THEN "Low Stock"
                    ELSE "In Stock"
                END;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS inventory_status_update');
    }
};
