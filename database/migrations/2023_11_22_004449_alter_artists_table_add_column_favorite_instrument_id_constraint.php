<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $table = 'artists';
    private $column = 'favorite_instrument_id';
    private $targetTable = 'instruments';
    private $foreign = "artists_favorite_instrument_id_foreign";

    public function up(): void
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->unsignedBigInterger($column)->nullable()->after('is_singer');
            $table->foreign($column)->references('id')->on($targetTable);
        });
    }

    public function down(): void
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropForeign($foreign);
            $table->dropColumn($column);
        });
    }
};
