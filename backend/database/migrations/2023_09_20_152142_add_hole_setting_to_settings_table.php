<?php

use App\Models\Settings\Settings;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddHoleSettingToSettingsTable extends Migration
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
                'value' => 1000,
                'code' => Settings::CODE_PRICE_HOLE
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
        DB::table('setting')->where(Settings::CODE_PRICE_HOLE)->delete();
    }
}
