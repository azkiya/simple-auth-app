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
        Schema::create('reimbursements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_invoice')->unique();
            $table->string('nama');
            $table->string('tanggal');
            $table->string('deskripsi');
            $table->string('file')->nullable();
            $table->tinyInteger('status')->default(0);//0:waiting, 1: approved, 2:reject
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reimbursements');
    }
};
