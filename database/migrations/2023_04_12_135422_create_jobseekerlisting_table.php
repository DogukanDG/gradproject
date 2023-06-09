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
            $table->string('name');
            $table->string('last_name');
            $table->boolean('is_active')->default(true);
            $table->json('skills');
            $table->json('educations')->nullable();
            $table->string('experience');
            $table->string('location');
            $table->string('email');
            $table->boolean('applysearch')->default(false);
            $table->dateTime('expiration_date')->nullable();
            $table->string('cv')->nullable();
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