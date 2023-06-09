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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sender_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('receiver_id')->constrained()->onDelete('cascade');
            $table->string('sender_email');
            $table->string('receiver_email');
            $table->string('company_name');
            $table->string('receiver_listing_id');
            $table->boolean('is_active')->default(true);
            $table->boolean('show_history')->default(true);
            $table->string('status')->default('Pending');
            $table->dateTime('expiration_date')->nullable();
            $table->string('phone_number');
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
        Schema::dropIfExists('offers');
    }
};