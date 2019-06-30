<?php

namespace App\Http\Controllers;

use App\Goal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function getGoals()
    {
        $userid = Auth::id();
        $goals = Goal::where('user_id', $userid)->get();
        return view( 'welcome', [ 'goals'=>$goals ] );
    }

    public function getGoalById( $id )
    {
        return view( 'GoalDetail', [ 'goal' => Goal::findOrFail( $id ) ] );
    }

    public function editGoal( $id )
    {
        return view( 'GoalEdit', [ 'goal' => Goal::findOrFail( $id ) ] );
    }

    protected function redirectToHomePage( $message )
    {
        return redirect('/')->withSuccess($message);
    }

    public function createNewGoal(Request $request)
    {
        $this->validate($request, [
            'goalName' => 'required',
            'goalDate' => 'required',
            'goalReason' => 'required'
        ]);
        
        $goal = new Goal;
        $goal->goalname = $request->goalName;
        $goal->goaldate = $request->goalDate;
        $goal->goalreason = $request->goalReason;
        $goal->user_id = Auth::id();
        $goal->save();
        return $this->redirectToHomePage( 'New goal created!' );
    }

    public function updateGoal(Request $request, $id)
    {
        $goal = Goal::findOrFail($id);
        $goal->goalname = $request->goalName;
        $goal->goaldate = $request->goalDate;
        $goal->goalreason = $request->goalReason;
        $goal->save();
        return $this->redirectToHomePage( 'Goal updated!' );
    }

    public function deleteGoal($id)
    {
        $goal = Goal::findOrFail($id);
        $goal->delete();
        return $this->redirectToHomePage( 'Goal Deleted!' );
    }
}