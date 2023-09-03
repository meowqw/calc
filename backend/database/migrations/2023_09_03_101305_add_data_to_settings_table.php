<?php

use App\Models\Settings\Settings;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddDataToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('settings')->truncate();
        DB::table('settings')->insert(
            [
                [
                    'value' => 1000,
                    'code' => Settings::CODE_LOGISTIC_PRICE
                ],
                [
                    'value' => 7000,
                    'code' => Settings::CODE_START_PRICE
                ],
                [
                    'value' => 150,
                    'code' => Settings::CODE_CUTTING_PRICE
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
}
