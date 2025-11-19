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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            // Edit the migration
            // Note: The constrained ensures that the two foreign IDs exist before they may be used,
            //       and cascade on delete means that if the user is deleted,
            //       then all votes are deleted that they make, and likewise if the chirp is deleted,
            //       then the votes for it are also deleted
            $table->foreignID('joke_id')->constrained()->cascadeOnDelete();
            $table->foreignID('user_id')->constrained()->cascadeOnDelete();
            $table->smallInteger('vote');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
