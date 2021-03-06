<?php

namespace App\Http\Controllers;

use App\Goal;
use App\GoalEntry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function getGoals()
    {
        $userid = Auth::id();
        $goals = Goal::where('user_id', $userid)->orderBy('created_at')->paginate(5);
        return view( 'welcome', [ 'goals'=>$goals ] );
    }

    public function getGoalById( $id )
    {
        $entries = GoalEntry::where('goal_id', $id)->orderBy('entrydate')->paginate(3);
        return view( 'GoalDetail', [ 'goal' => Goal::findOrFail( $id ), 'entries' => $entries ] );
    }

    public function editGoal( $id )
    {
        return view( 'GoalEdit', [ 'goal' => Goal::findOrFail( $id ) ] );
    }

    protected function redirectToHomePage( $message )
    {
        return redirect('/')->withSuccess($message);
    }

    public function create()
    {
        return view('NewGoal');
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