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
        Schema::create('business_contacts', function (Blueprint $table) {
            $table->id();

            $table->foreignId("business_id")->constrained("businesses")->onDelete("cascade");
            $table->enum("type", [
                "sales",
                "logistics"
            ]);

            $table->boolean("is_primary")->default(false);
            $table->string("name", 50);
            $table->string("email");
            $table->string("telephone", 20);

            $table->timestamps();
        });

        if (DB::connection()->getDriverName() === 'pgsql') {
            DB::statement('CREATE INDEX idx_business_contacts_main_query ON business_contacts (business_id, type, is_primary) INCLUDE (name, email, telephone)');
        } else {
            DB::statement('CREATE INDEX idx_business_contacts_main_query ON business_contacts (business_id, type, is_primary)');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_contacts');
        DB::statement("DROP INDEX IF EXISTS idx_business_contacts_main_query");
    }
};
