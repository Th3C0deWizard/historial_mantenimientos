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
        Schema::create('observations', function (Blueprint $table) {
            $table->id();
            $table->string('message', 255);
            $table->foreignId('category_id')->references('id')
                ->on('categories')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->references('id')
                ->on('users')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('computer_id')->references('id')
                ->on('computers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observations');
    }
};
