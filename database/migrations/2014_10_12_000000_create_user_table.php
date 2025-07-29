<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id(); // id INT AUTO_INCREMENT PRIMARY KEY
            $table->string('username', 50); // username VARCHAR(50) NOT NULL
            $table->string('password', 255); // password VARCHAR(255) NOT NULL
            $table->enum('role', ['admin', 'user']); // role ENUM('admin','user') NOT NULL
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
