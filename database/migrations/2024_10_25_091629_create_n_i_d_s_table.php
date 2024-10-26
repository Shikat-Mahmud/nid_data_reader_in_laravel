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
        Schema::create('n_i_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('nid_number')->nullable();
            $table->string('name')->nullable();
            $table->string('dob')->nullable();
            // $table->string('mothers_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nids');
    }
};
