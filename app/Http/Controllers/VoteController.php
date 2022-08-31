<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

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
}
