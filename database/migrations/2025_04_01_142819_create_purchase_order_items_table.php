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
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("purchase_order_id")->onDelete("cascade");
            $table->foreignId("product_id")->onDelete("cascade");
            $table->integer("quantity");
            $table->dateTime("delivery_date");
            $table->decimal("cost", 10, 2);
            $table->enum("status", [
                'New',
                'Accepted by Supplier',
                'In Delivery',
                'Rejected by Supplier',
                'Rejected by Distributor',
                'Cancelled'
            ]);
            
            $table->timestamps();

            $table->index(["purchase_order_id", "product_id", "status", "delivery_date"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_items');
    }
};
