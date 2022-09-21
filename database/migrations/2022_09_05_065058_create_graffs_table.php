<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('graffs', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 50)->nullable();
            $table->text('description')->nullable();
            $table->string('artiste' , 50)->nullable();
            $table->string('addresse' , 80)->nullable();
            $table->string('ville', 30)->nullable();
            $table->string('region', 20)->nullable();
            $table->string('image', 80)->nullable();
            $table->decimal('latitude', 8, 8)->nullable();
            $table->decimal('longitude', 9, 8)->nullable();
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
       // Schema::dropIfExists('graffs');
    }
};
