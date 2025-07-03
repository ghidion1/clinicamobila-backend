<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramariTable extends Migration
{
    public function up()
    {
        Schema::create('programari', function (Blueprint $table) {
            $table->id();
            $table->string('nume', 64);
            $table->string('prenume', 64);
            $table->string('specialitate');
            $table->string('medic');
            $table->date('data');
            $table->string('ora');
            $table->string('telefon');
            $table->string('email')->nullable();
            $table->string('motiv')->nullable();
            $table->text('mesaj')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programari');
    }
}
