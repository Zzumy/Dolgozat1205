<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
        User::create([
            'name' => 'Nguyen Duc Duy',
            'email' => 'admin1@gmail.com',
            'password' => 'admin123'
        ]);
        User::create([
            'name' => 'Veress Marcell',
            'email' => 'admin2@gmail.com',
            'password' => 'admin321'
        ]);
    }
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
