<?php

use App\Models\Travel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('travel', function (Blueprint $table) {
            $table->primary(['flight_id', 'user_id']);
            $table->foreignId('flight_id')->references('flight_id')->on('flights');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('evaluation');
            $table->timestamps();
        });
        Travel::create([
            'evaluation' => 'asd',
            'flight_id' => 1,
            'user_id' => 1
        ]);
        Travel::create([
            'evaluation' => 'fgh',
            'flight_id' => 2,
            'user_id' => 2
        ]);
    }
    public function down(): void
    {
        Schema::dropIfExists('travel');
    }
};
