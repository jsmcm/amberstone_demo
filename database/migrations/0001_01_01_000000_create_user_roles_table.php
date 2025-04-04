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
        // NOT DOING IT THIS WAY, IT COMPLICATES
        // MIDDLEWARE TOO MUCH TRYING TO THINK ABOUT
        // WHAT TO DO IF NEW USER TYPES ARE ADDED INTO
        // THE DB BUT ARE NOT ACCOUNTED FOR IN THE CODE

        // Schema::create('user_roles', function (Blueprint $table) {
        //     $table->id();

        //     $table->string("role", 50)->unique();

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('user_roles');
    }
};
