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
        Schema::create('texts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained();
            $table->foreignId('theme_id')->constrained();
            $table->string('title');
            $table->year('year_published')->nullable();
            $table->date('date_registered');
            $table->string('language')->nullable();
            $table->string('keywords')->nullable();
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('texts');
    }

    /**
     * Set up Eloquent many-to-many relationship.
     * Many texts can be shared by many authors.
     */

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class); 
    }

    /**
     * Set up Eloquent many-to-many relationship.
     * Many texts can be shared by many themes.
     */

    public function themes(): BelongsToMany
    {
        return $this->belongsToMany(Theme::class); 
    }
    
     
};
