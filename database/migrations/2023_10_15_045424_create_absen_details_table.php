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
        Schema::create('absen_details', function (Blueprint $table) {
            $table->id();
            $table->string('date_detail', 200)->nullable();
            $table->foreignId('student_id');
            $table->foreignId('rombel_id');
            $table->string('attendance', 200)->nullable();
            $table->string('detail', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('absen_details');
    }
};