<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddTestDataToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::table('settings')->insert(
            [
                'start_price' => 6000,
                'logistic_price' => 1000
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::table('settings')
            ->where('start_price', 6000)
            ->where('logistic_price', 1000)->delete();
    }
}
