<?php

use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->decimal("price", 60,2);
            $table->string("photo")->nullable();
            $table->unsignedBigInteger('owner')->nullable();
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('responsible')->nullable();
            $table->foreign('responsible')->references('id')->on('users')->onDelete('cascade');
      
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            
            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onDelete('cascade');
            
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            
            $table->enum('status', ['pendente', 'validado'])->default('pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
