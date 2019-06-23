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

    protected function redirectToHomePage( $message )
    {
        return redirect('/')->with([
            'flash-message'=>$message,
            'flash-message-important'=>true
        ]);;
    }

    public function createNewGoal(Request $request)
    {
        $goal = new Goal;
        $goal->goalname = $request->goalName;
        $goal->goaldate = $request->goalDate;
        $goal->goalreason = $request->goalReason;
        $goal->save();
        return $this->redirectToHomePage( 'New goal created!' );
    }

    public function deleteGoal($id)
    {
        $goal = Goal::findOrFail($id);
        $goal->delete();
        return $this->redirectToHomePage( 'Goal Deleted!' );
    }
}