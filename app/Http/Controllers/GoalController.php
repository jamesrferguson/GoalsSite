<?php

namespace App\Http\Controllers;

use App\Goal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoalController extends Controller
{
    public function getGoals()
    {
        $goals = Goal::all();
        return view( 'welcome', [ 'goals'=>$goals ] );
    }

    public function getGoalById( $id )
    {
        return view( 'GoalDetail', [ 'goal' => Goal::findOrFail( $id ) ] );
    }

    public function createNewGoal(Request $request)
    {
        $goal = new Goal;
        $goal->goalname = $request->goalName;
        $goal->goaldate = $request->goalDate;
        $goal->goalreason = $request->goalReason;

        $goal->save();

        return redirect('/')->with([
            'flash-message'=>'New goal created!',
            'flash-message-important'=>true
        ]);;
    }

    public function deleteGoal($id)
    {
        $goal = Goal::findOrFail($id);
        $goal->delete();
        return redirect('/')->with([
            'flash-message'=>'Goal Deleted!',
            'flash-message-important'=>true
        ]);;
    }
}