<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        $travels = response()->json(Travel::all());
        return $travels;
    }

    public function show($id)
    {
        $travel = response()->json(Travel::find($id));
        return $travel;
    }

    public function delete($id)
    {
        Travel::find($id)->delete();
        return redirect('/travel/list');
    }

    public function store(Request $request)
    {
        $travel = new Travel();
        $travel->evaluation = $request->evaluation;
        $travel->flight_id = $request->flight_id;
        $travel->user_id = $request->user_id;
        $travel->save();
        return redirect('/travel/list');
    }

    public function update(Request $request, $id)
    {
        $travel = Travel::find($id);
        $travel->evaluation = $request->evaluation;
        $travel->flight_id = $request->flight_id;
        $travel->user_id = $request->user_id;
        $travel->save();
        return redirect('/travel/list');
    }

    public function displayUserFlightsForAirline($airlineId)
    {
        $user = Auth::user();
        $travels = $user->travels()
            ->whereHas('flight', function ($query) use ($airlineId) {
                $query->where('airline_id', $airlineId);
            })
            ->get();

        return $travels;
    }
    public function markArrived(Request $request, $id)
    {
        $user = Auth::user();
        $travel = $user->travels()->find($id);
        if (!$travel) {
            return response()->json(['error' => 'Travel not found or does not belong to the user.'], 404);
        }
        $travel->status = 'megérkezett';
        $travel->save();
        return response()->json(['message' => 'Travel status updated to "megérkezett".']);
    }
}
