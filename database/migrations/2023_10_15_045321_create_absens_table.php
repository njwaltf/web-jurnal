<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->foreignId('rombel_id');
            $table->integer('hadir')->nullable();
            $table->integer('izin')->nullable();
            $table->integer('sakit')->nullable();
            $table->integer('alpha')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('absens');
    }
};