<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\UserTrip;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Expense::all()->toArray();
    }
     public function tripExpenses($trip_id)
    {
        return Expense::where("trip_id", $trip_id)->get()->toArray();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $expense = new Expense();
        $expense->name = $request->name;
        $expense->cost = $request->cost;
        $expense->trip_id = $request->trip_id;
        $expense->user_id = $request->user()->id;
        $expense->save();
    }
    public function createMultiple(Request $request)
    {
        for ($i = 0; $i < count($request->expenses);$i++){
            $expense = new Expense();
            $expense->name = $request->expenses[$i]['name'];
            $expense->cost = $request->expenses[$i]['cost'];
            $expense->trip_id = $request->trip_id;
            $expense->user_id = $request->user()->id;
            $expense->save();
        }
         $userTrips = UserTrip::where('user_id', $request->user()->id)->with("trip.expenses")->get()->toArray();
        for($i = 0; $i < count($userTrips);$i++){
            $userTrips[$i] = $userTrips[$i]['trip'];
        }

        return $userTrips;
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
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Expense::destroy($id);
        $userTrips = UserTrip::where('user_id', $request->user()->id)->with("trip.expenses")->get()->toArray();
        for($i = 0; $i < count($userTrips);$i++){
            $userTrips[$i] = $userTrips[$i]['trip'];
        }

        return $userTrips;
    }
}
