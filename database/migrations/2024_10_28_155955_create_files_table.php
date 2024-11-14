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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path');
            $table->boolean('is_taken')->default(false);
            $table->timestamps();
        });

        Schema::table('files', function (Blueprint $table) {
            $table->string('taken_by')->nullable(); // Agrega el campo taken_by
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('files', function (Blueprint $table) {
            $table->dropColumn('taken_by'); 
        });

        
        Schema::dropIfExists('files');
    }
};
