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
        Schema::table('categories', function (Blueprint $table) {
            // Add the foreign key column
           // $table->unsignedBigInteger('department_id')->after('id');
           $table->unsignedBigInteger('department_id')->nullable();
            // Set up the foreign key constraint
            $table->foreign('department_id')
                  ->references('id')->on('department') // Match table name here
                  ->onDelete('cascade'); // Optional: Delete categories when the department is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // Drop the foreign key and column
            $table->dropForeign(['department_id']);
            $table->dropColumn('department_id');
        });
    }
};
