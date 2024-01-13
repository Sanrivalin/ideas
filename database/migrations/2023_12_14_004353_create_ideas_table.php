<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * ideas varchar 240 char content
     * likes interger 0
     * created_at
     * updated_at
     */
    public function up(): void
    {
        //storing the owner of a comment and an idea
        //Who created an specific idea in or databse
        //it is possible adding a foreing id 'user_id' to both table, ideas and comments.
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('content');
            $table->unsignedInteger('likes')->default(0);
            $table->timestamps();//created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ideas');
    }
};
