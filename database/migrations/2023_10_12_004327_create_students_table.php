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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 200)->unique();
            $table->string('full_name', 200);
            $table->foreignId('jurusan_id');
            $table->string('tahun_ajaran', 50);
            $table->foreignId('rombel_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('students');
    }
};