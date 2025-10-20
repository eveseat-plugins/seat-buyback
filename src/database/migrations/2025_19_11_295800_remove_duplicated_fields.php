<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('buyback_market_config', function (Blueprint $table){
            $table->dropColumn('typeName');
            $table->dropColumn('groupName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void {
        Schema::table('buyback_market_config', function (Blueprint $table){
            $table->string('typeName');
            $table->string('groupName');
        });
    }
};
