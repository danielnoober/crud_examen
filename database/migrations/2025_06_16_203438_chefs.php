<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chefs', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 45);
            $table->string('apellidos', 45);
            $table->date('fecha_nacimiento');
            $table->string('foto')->nullable(); // SOLO nullable, sin change()
            $table->string('matricula', 45);
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chefs', function (Blueprint $table) {
            $table->string('foto')->nullable(false)->change();
        });
    }
};
