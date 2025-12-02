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
        // Add Additional Column
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'given_name')) {
                $table->string('given_name')->nullable()->after('email');
            }

            if (!Schema::hasColumn('users', 'family_name')) {
                $table->string('family_name')->nullable()->after('given_name');
            }
//            $table->string('given_name')->nullable()->after('email');
//            $table->string('family_name')->nullable()->after('given_name');
//            $table->string('name', 64)->change();
            $table->dateTime('login_at')->nullable();
            $table->dateTime('logout_at')->nullable();

            $table->index(['family_name', 'given_name'], 'family_given_index');
            $table->index(['given_name', 'family_name'], 'given_family_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Delete index that is added by up()
            $table->dropIndex('family_given_index');
            $table->dropIndex('given_family_index');

            // Delete column that is added by up()
            $table->dropColumn([
                'given_name',
                'family_name',
                'login_at',
                'logout_at',
            ]);

            // change the length of name to the original length
            $table->string('name')->change();
        });

    }
};
