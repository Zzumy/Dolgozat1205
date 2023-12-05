<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    public function index()
    {
        $airlines = response()->json(Airline::all());
        return $airlines;
    }

    public function show($id)
    {
        $airline = response()->json(Airline::find($id));
        return $airline;
    }

    public function delete($id)
    {
        Airline::find($id)->delete();
        return redirect('/airline/list');
    }

    public function store(Request $request)
    {
        $airline = new Airline();
        $airline->name = $request->name;
        $airline->country = $request->country;
        $airline->save();
        return redirect('/airline/list');
    }

    public function update(Request $request, $id)
    {
        $airline = Airline::find($id);
        $airline->name = $request->name;
        $airline->country = $request->country;
        $airline->save();
        return redirect('/airline/list');
    }

    public function newView()
    {
        return view('airline.new');
    }

    public function editView($id)
    {
        $airline = Airline::find($id);
        return view('airline.edit', ["airline" => $airline]);
    }

    public function listView()
    {
        $airlines = Airline::all();
        return view("airline.list", ["airlines" => $airlines]);
    }

    public function deleteView()
    {
        $airlines = Airline::all();
        return view("airline.delete", ["airlines" => $airlines]);
    }

    public function DisplayAllAirlines()
    {
        $airlines = DB::table('airlines')->get();
        return $airlines;
    }
}
