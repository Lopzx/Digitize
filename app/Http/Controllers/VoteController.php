<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function getSongPage(Request $request) {
        $songParticipant = People::where('addCategory', 'song')->get();
        return view('vote', ['songParticipant' => $songParticipant]);
    }

    public function getArtPage(Request $request){
        $artParticipant = People::where('addCategory', 'art')->get();
        return view('vote', ['artParticipant' => $artParticipant]);
    }

    public function getDancePage(Request $request){
        $danceParticipant = People::where('addCategory', 'dance')->get();
        return view('vote', ['danceParticipant' => $danceParticipant]);
    }

    public function vote(Request $request, $participantId) {
        User::find(Auth::user()->id)->update(['voted' => true]);
        $vote = People::find($participantId);
        $currentVal = $vote->vote;
        $vote->update(['vote' => $currentVal + 1]);
        return redirect()->back();
    }

}
