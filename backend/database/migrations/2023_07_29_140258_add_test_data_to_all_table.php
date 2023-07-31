<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddTestDataToAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('materials')->insert([
            [
                'name' => 'Кирпич'
            ],
            [
                'name' => 'Бетон'
            ]
        ]);

        DB::table('extra_works')->insert([
            [
                'name' => 'Доп работа 1',
                'cost' => 1000
            ],
            [
                'name' => 'Доп работа 2',
                'cost' => 2000
            ]
        ]);

        DB::table('crowns')->insert([
            [
                'name' => '10-15'
            ],
            [
                'name' => '20-25'
            ]
        ]);

        DB::table('coefficients')->insert([
            [
                'name' => 'Сверление снизу вверх',
                'value' => 1.5,
                'start_price' => 3000
            ],
            [
                'name' => 'Сухим способом, кирпич/газоблок',
                'value' => 2.5,
                'start_price' => 4000
            ]
        ]);

        DB::table('crown_material')->insert([
            [
                'crown_id' => '1',
                'material_id' => '1',
                'cost' => 20,
                'price' => '100'
            ],
            [
                'crown_id' => '1',
                'material_id' => '2',
                'cost' => 30,
                'price' => '100'
            ],
            [
                'crown_id' => '2',
                'material_id' => '1',
                'cost' => 25,
                'price' => '100'
            ],
            [
                'crown_id' => '2',
                'material_id' => '2',
                'cost' => 50,
                'price' => '100'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all', function (Blueprint $table) {
            //
        });
    }
}
