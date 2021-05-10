<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Trip::all()->toArray();
    }
    public function organizer(Request $request)
    {
        return Trip::where('organizer', $request->user()->id)->get()->toArray();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $trip = new Trip();
        $trip->organizer = $request->user()->id;
        $trip->name = $request->name;
        $trip->city = $request->city;
        $trip->state = $request->state;
        $trip->start_date = $request->start_date;
        $trip->end_date = $request->end_date;

        //Trip token needs to be unique, right now it is "technically" not unique
        $trip_token = str_replace(' ', '', $request->name);
        $trip_token = preg_replace('/[^a-z]+/i', '_', $trip_token);
        $trip_token = substr($trip_token,0,12);
        $token_length = strlen($trip_token);
        $hash = Str::random(16-$token_length);
        $trip->trip_token = $trip_token.$hash;
        $trip->save();

        return Trip::where('organizer', $request->user()->id)->get()->toArray();


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
