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
        Schema::create('appointment_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            //forign key to the main model
            $table->foreignId('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            $table->unique(['appointment_id','locale']);
            //acutal field you want to translate
            $table->string('name');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_translations');
    }
};
