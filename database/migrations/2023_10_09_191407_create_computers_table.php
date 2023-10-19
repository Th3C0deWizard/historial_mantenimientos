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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 10);
            $table->string('brand', 50);
            $table->integer('ram');
            $table->string('cpu', 30);
            $table->foreignId('registered_by')->nullable();
            $table->timestamps();
            $table->foreign('registered_by')
                ->references('id')
                ->on('users')
                ->restrictOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
