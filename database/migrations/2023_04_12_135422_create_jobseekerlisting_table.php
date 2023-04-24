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
        Schema::create('jobseekerlistings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->dateTime('expiration_date')->nullable();
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->string('tags');
            $table->json('educations')->nullable();
            $table->string('experience');
            $table->string('location');
            $table->string('email');
            $table->string('cv')->nullable();
            $table->string('desired_roles');
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
        Schema::dropIfExists('jobseekerlisting');
    }
};