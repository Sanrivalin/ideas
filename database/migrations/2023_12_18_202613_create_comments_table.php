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
        Schema::create('comments', function (Blueprint $table) {
            //idea_id
            //content
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // Is a convention to named foreingkey using the name of the class first in you relationship,
            // and then underline and the id exam. 'idea_id'.
            //"contrained" makes sure that comments cannot be created for ideas that doesn't exists.
            $table->foreignId('idea_id')->constrained()->cascadeOnDelete();
            $table->string('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
