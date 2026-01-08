<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('promo_code_id')->nullable()->after('topup_id');
            $table->string('promo_code')->nullable()->after('promo_code_id');
            $table->unsignedInteger('original_price')->default(0)->after('amount');
            $table->unsignedInteger('discount')->default(0)->after('original_price');

            $table->foreign('promo_code_id')
                ->references('id')
                ->on('promo_codes')
                ->nullOnDelete();
        });

        // Backfill existing rows so receipts/recaps remain sensible
        DB::table('transactions')->where('original_price', 0)->update([
            'original_price' => DB::raw('price'),
            'discount' => 0,
        ]);
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['promo_code_id']);
            $table->dropColumn(['promo_code_id', 'promo_code', 'original_price', 'discount']);
        });
    }
};
