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
        Schema::create('category_joke', function (Blueprint $table) {
            $table->id();

            $table->string('category_id'); // This is the id in the category table
            $table->unsignedBigInteger('joke_id'); // This is the id in the joke table

            // Set up the rules of the both foreign keys (category_id, joke_id)
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('joke_id')->references('id')->on('jokes')->onDelete('cascade');
            // These mean ...
            // * category_id must exist in the categories table
            // * joke_id must exist in the jokes table
            // If the category or joke is deleted, the values related to them in the pivot table will be deleted automatically because of "onDelete('cascade')"

            // The pair will be unique
            $table->unique(['category_id', 'joke_id']);

            // https://laracasts.com/discuss/channels/eloquent/how-to-define-compond-key-uniqueness-in-migration

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_joke');
    }
};
