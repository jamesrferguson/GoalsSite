<?php

namespace App\Http\Controllers;

use App\Goal;
use App\GoalEntry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNewEntryForGoal($goalId)
    {
        return view( 'AddEntry', [ 'goal' => Goal::findOrFail( $goalId ) ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $goalId)
    {
        $this->validate($request, [
            'entryDate' => 'required',
            'entryName' => 'required',
            'entryDetail' => 'required'
        ]);

        $entry = new GoalEntry;
        $entry->entryname = $request->entryName;
        $entry->entrydate = $request->entryDate;
        $entry->entrytext = $request->entryDetail;
        $entry->goal_id = $goalId;
        $entry->save();
        return redirect("/goaldetail/{$goalId}")->withSuccess("Created new entry for goal.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
