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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('mpesa_code');
            $table->string('amount');
            $table->string('phone');
            $table->unsignedBigInteger('order_number');
            $table->unsignedBigInteger('user_id');

           // $table->foreign('user_id') // Define foreign key constraint
           // ->references('user_id') // References the 'id' column in the 'users' table
           // ->on('orders'); // The table being referenced is 'users'
           // ->onDelete('cascade'); // Optional: cascade delete if the user is deleted

            //$table->foreign('order_number') // Define foreign key constraint
            //->references('order_number') // References the 'id' column in the 'users' table
           // ->on('orders'); // The table being referenced is 'users'
           // ->onDelete('cascade'); // Optional: cascade delete if the user is deleted


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
