<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::get();
        
        return response()->json($vehicles);
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'plate_number' => 'required',
            'insurance_date' => 'required',
        ]);

        $vehicle = new Vehicle();
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->plate_number = $request->plate_number;
        $vehicle->insurance_date = $request->insurance_date;
        $vehicle->save();

        return response()->json('Vehicle created!');
    }
  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'plate_number' => 'required',
            'insurance_date' => 'required',
        ]);
        
        $vehicle->update($request->all());

        return response()->json('Vehicle updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return response()->json('Vehicle deleted!');
    }
}
