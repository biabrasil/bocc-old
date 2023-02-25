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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institution_id')->constrained();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('bio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }

    /**
     * Set up Eloquent many-to-many relationship.
     * Many authors can be shared by many texts.
     */

    public function texts(): BelongsToMany
    {
        return $this->belongsToMany(Text::class); 
    }

    /**
     * Set up Eloquent many-to-one relationship.
     * Many authors can be shared by one institution.
     */

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class); 
    }

};
