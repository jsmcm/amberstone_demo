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
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId("product_id")->onDelete("cascade");
            $table->integer("year");
            $table->decimal("cost_per_kg", 10, 2);

            $table->timestamps();
            


        });

        if (DB::connection()->getDriverName() === 'pgsql') {
            DB::statement("CREATE INDEX idx_product_prices ON product_prices (product_id, year) INCLUDE (cost_per_kg)");
        } else {
            DB::statement("CREATE INDEX idx_product_prices ON product_prices (product_id, year)");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_prices');
    }
};
