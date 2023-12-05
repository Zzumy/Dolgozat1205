<?php

use App\Models\Flight;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id('flight_id');
            $table->date('date');
            $table->foreignId('airline_id')->references('airline_id')->on('airlines');
            $table->integer('limit');
            $table->timestamps();
        });
        Flight::create([
            'date' => '2023.12.02',
            'airline_id' => 1,
            'limit' => 400
        ]);
        Flight::create([
            'date' => '2023.12.04',
            'airline_id' => 2,
            'limit' => 200
        ]);
        Flight::create([
            'date' => '2023.12.08',
            'airline_id' => 3,
            'limit' => 800
        ]);
    }
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
