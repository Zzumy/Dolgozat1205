<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = response()->json(Flight::all());
        return $flights;
    }

    public function show($id)
    {
        $flight = response()->json(Flight::find($id));
        return $flight;
    }

    public function delete($id)
    {
        Flight::find($id)->delete();
        return redirect('/flight/list');
    }

    public function store(Request $request)
    {
        $flight = new Airline();
        $flight->date = $request->date;
        $flight->airline_id = $request->airline_id;
        $flight->limit = $request->limit;
        $flight->save();
        return redirect('/flight/list');
    }

    public function update(Request $request, $id)
    {
        $flight = Flight::find($id);
        $flight->date = $request->date;
        $flight->airline_id = $request->airline_id;
        $flight->limit = $request->limit;
        $flight->save();
        return redirect('/flight/list');
    }

    public function DisplayAllFlights()
    {
        $flights = DB::table('flights')->get();
        return $flights;
    }

    public function deleteScheduledFlightsForTomorrow()
    {
        $tomorrow = Carbon::now()->addDay()->toDateString();
        $flightsToDelete = Flight::where('date', $tomorrow)
            ->whereDoesntHave('travels')
            ->get();
        foreach ($flightsToDelete as $flight) {
            $flight->delete();
        }
        return response()->json(['message' => 'Scheduled flights for tomorrow without travels deleted.']);
    }
}
