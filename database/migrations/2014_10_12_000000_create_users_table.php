<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::disableForeignKeyConstraints();
            Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('role');
            $table->string('phone')->unique();
            $table->boolean('isVerified')->default(false);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps(); 
            
           
        });
        
        Schema::enableForeignKeyConstraints(); 
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
     {
         Schema::dropIfExists('users');
     }
};