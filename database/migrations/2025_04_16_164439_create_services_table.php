<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_services_table.php
  public function up()
{
    Schema::create('services', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->string('icon'); // e.g., fa-car
        $table->string('image'); // e.g., service-1.jpgs
        $table->timestamps();
    });
}

   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
