<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddMenuItemsToAdminMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::table('admin_menu')->insert([
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Материалы',
                'icon' => 'fa-bars',
                'uri' => '/materials',
                'permission' => '*'
            ],
            [
                'parent_id' => 0,
                'order' => 1,
                'title' => 'Коронки',
                'icon' => 'fa-bars',
                'uri' => '/crowns',
                'permission' => '*'
            ],
            [
                'parent_id' => 0,
                'order' => 2,
                'title' => 'Доп Работы',
                'icon' => 'fa-bars',
                'uri' => '/extra-works',
                'permission' => '*'
            ],
            [
                'parent_id' => 0,
                'order' => 3,
                'title' => 'Коэффициенты',
                'icon' => 'fa-bars',
                'uri' => '/coefficients',
                'permission' => '*'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::table('admin_menu')
            ->whereIn('uri', ['/materials', '/crowns', '/extra-works', '/coefficients'])->delete();
    }
}
