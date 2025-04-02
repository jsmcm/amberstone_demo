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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();

            $table->enum("type", [
                'distributor',
                'supplier'
            ]);
            $table->string("name");
            $table->string("address");
            $table->string("country", 25);
            $table->string("vat_number", 15)->unique();

            $table->timestamps();

            $table->index("type");
            
        });

        // Wrap this so our unit tests work
        if (DB::connection()->getDriverName() === 'pgsql') {
            DB::statement('CREATE EXTENSION IF NOT EXISTS pg_trgm');
            DB::statement('CREATE INDEX idx_businesses_name_trgm ON businesses USING gin (name gin_trgm_ops)');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
        DB::statement('DROP INDEX IF EXISTS idx_businesses_name_trgm');
    }
};
