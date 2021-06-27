<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('doctor_code_id')->constrained()->onDelete('cascade');
            $table->enum('specialization', ['gynecology', 'pediatrics', 'pathology', 'anesthesiology', 'ophthalmology', 'surgery', 'orthopedic surgery', 'plastic surgery', 'psychiatry', 'neurology', 'radiology', 'urology'])->nullable();
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->integer('rating')->default(0);
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
        Schema::dropIfExists('doctors');
    }
}
