<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookUserTable extends Migration
{
    public function up()
    {
        Schema::create('book_user', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->timestamp('borrowed_at')->nullable();
            $table->timestamp('returned_at')->nullable(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_user');
    }
}

