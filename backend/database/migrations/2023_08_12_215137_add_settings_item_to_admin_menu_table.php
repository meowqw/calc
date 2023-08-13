<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddSettingsItemToAdminMenuTable extends Migration
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
                'order' => 4,
                'title' => 'Настройки',
                'icon' => 'fa-bars',
                'uri' => '/settings',
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
            ->where('uri', '/settings')->delete();
    }
}
