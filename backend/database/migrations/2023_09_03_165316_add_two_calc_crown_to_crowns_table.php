<?php

use App\Models\Crown\Crown;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddTwoCalcCrownToCrownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::table('crowns')->insert(
            [
                'code' => Crown::CODE_TWO_CALC,
                'name' => '120'
            ],
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
    }
}
