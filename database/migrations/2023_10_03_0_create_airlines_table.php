<?php

use App\Models\Airline;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('airlines', function (Blueprint $table) {
            $table->id('airline_id');
            $table->string('name');
            $table->string('country');
            $table->timestamps();
        });
        Airline::create([
            'name' => 'Lufthansa',
            'country' => 'London'
        ]);
        Airline::create([
            'name' => 'WizzAir',
            'country' => 'Rome'
        ]);
        Airline::create([
            'name' => 'EmiratesAirline',
            'country' => 'Dubai'
        ]);
    }
    public function down(): void
    {
        Schema::dropIfExists('airlines');
    }
};
