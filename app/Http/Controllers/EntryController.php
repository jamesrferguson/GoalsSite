<?php

namespace App\Http\Controllers;

use App\Goal;
use App\GoalEntry;
use Illuminate\Http\Request;

class EntryController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNewEntryForGoal($goalId)
    {         
        return view( 'AddEntry', [ 'goal' => Goal::findOrFail( $goalId ) ] );
    }


    public function getEntryById( $id )
    {
        return view( 'EntryDetail', [ 'entry' => GoalEntry::findOrFail( $id ) ] );
    }


    public function editEntry( $id )
    {
        return view( 'EntryEdit', [ 'entry' => GoalEntry::findOrFail( $id ) ] );
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

    public function updateEntry(Request $request, $id)
    {
        $entry = GoalEntry::findOrFail($id);
        $entry->entryname = $request->entryName;
        $entry->entrydate = $request->entryDate;
        $entry->entrytext = $request->entryDetail;
        $entry->save();
        return redirect("/entrydetail/{$id}")->withSuccess("Entry updated.");
    }

    public function deleteEntry($id)
    {
        $entry = GoalEntry::findOrFail($id);
        $goalId = $entry->goal_id;
        $entry->delete();
        return redirect("/goaldetail/{$goalId}")->withSuccess("Entry deleted.");
    }

}
