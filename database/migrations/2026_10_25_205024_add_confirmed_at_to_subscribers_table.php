<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('subscribers', function (Blueprint $table) {
            $table->timestamp('confirmed_at')->nullable()->after('subscribed_at');
        });

        DB::table('subscribers')
            ->where('active', true)
            ->whereNull('confirmed_at')
            ->update(['confirmed_at' => DB::raw('subscribed_at')]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscribers', function (Blueprint $table) {
            $table->dropColumn('confirmed_at');
        });
    }
};
