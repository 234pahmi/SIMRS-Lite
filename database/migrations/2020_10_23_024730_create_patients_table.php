<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('polyclinic_id');
            $table->string('name');
            $table->longText('address');
            $table->string('phone_number');
            $table->string('category_patient');
            $table->date('date');
            $table->text('diagnose')->nullable();
            $table->boolean('is_diagnose', [0,1])->default(0);
            $table->boolean('is_active', [0,1])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
