<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Customer name
            $table->string('email')->unique(); // Unique email
            $table->string('phone')->nullable(); // Phone number (nullable)
            $table->string('address')->nullable(); // Customer address (nullable)
            $table->unsignedBigInteger('department_id'); // Foreign key for department
            $table->timestamps(); // created_at and updated_at columns

            // Foreign key relationship with department table
            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
