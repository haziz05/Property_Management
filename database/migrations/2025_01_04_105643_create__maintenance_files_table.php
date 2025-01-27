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
        Schema::create('_maintenance_files', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('queryNumber');
            $table->string('tenantName');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->date('date');
            $table->string('fileName');
            $table->string('path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_maintenance_files');
    }
};