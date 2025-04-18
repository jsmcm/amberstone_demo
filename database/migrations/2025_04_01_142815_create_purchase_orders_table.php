<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();

            $table->enum("type", [
                "pos",
                "pod"
            ]);
            $table->integer("parent_id")->nullable();
            $table->foreignId("business_id")->onDelete("cascade");
            $table->enum("status", [
                "pending",
                "accepted",
                "rejected",
                "delivered",
            ]);

            $table->timestamps();

            $table->index(["type", "business_id", "created_at", "parent_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
