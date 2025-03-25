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
        Schema::create('workers', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->unsignedBigInteger('payment_type');
            $table->string('role_type');
            $table->string('name');
            $table->string('filename_type');
            $table->foreign('payment_type')->references('type')->on('payments')->onDelete('cascade');
            $table->foreign('role_type')->references('type')->on('roles')->onDelete('cascade');
            $table->foreign('filename_type')->references('filename')->on('achievements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workers', function (Blueprint $table) {
            Schema::dropIfExists('workers');
        });
    }
};
