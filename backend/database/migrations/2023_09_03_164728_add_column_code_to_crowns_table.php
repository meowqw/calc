<?php

use App\Models\Crown\Crown;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCodeToCrownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('crowns', function (Blueprint $table) {
            $table->string('code')->after('name')->default(Crown::CODE_ONE_CALC);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('crowns', function (Blueprint $table) {
            $table->dropColumn('code');
        });
    }
}
