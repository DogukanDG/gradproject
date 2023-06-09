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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('logo')->nullable();
            $table->boolean('is_active')->default(true);
            $table->json('skills')->nullable();
            $table->unsignedInteger('person_need')->default(1);
            $table->string('name');
            $table->dateTime('expiration_date')->nullable();
            $table->string('location');
            $table->string('email');
            $table->boolean('applysearch')->default(false);
            $table->longtext('description');
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
        Schema::dropIfExists('listings');
    }
};