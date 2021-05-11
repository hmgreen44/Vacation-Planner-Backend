<?php

namespace App\Http\Controllers;

use App\Models\UserTrip;
use App\Models\Trip;
use Illuminate\Http\Request;

class UserTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserTrip::all();
    }
     public function attendees($trip_id){
         return UserTrip::where('trip_id', $trip_id)->with("trip")->get()->toArray();
        
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = '';
        $success = false;
        $trip = Trip::where("trip_token",$request->trip_token)->get();
       
        if(count($trip) == 1){
            $userId = $request->user()->id;
            $foundUserTrip = UserTrip::where("user_id", $userId)->where("trip_id", $trip[0]->id)->get();
            
             if(count($foundUserTrip)==0){
                $userTrip = new UserTrip;
                $userTrip->user_id = $userId;
                $userTrip->trip_id = $trip[0]->id;
                $userTrip->save();
                $success = true;
                $response = "user successfully added to trip";
            }else{
                $response = "user id already joined this trip";
            }
            
        }else{
            $response = "trip token invalid";
        }
        return ["success"=>$success, "text"=>$response];
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTrip  $userTrip
     * @return \Illuminate\Http\Response
     */
    public function show(UserTrip $userTrip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserTrip  $userTrip
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTrip $userTrip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserTrip  $userTrip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserTrip $userTrip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTrip  $userTrip
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTrip $userTrip)
    {
        //
    }
}
