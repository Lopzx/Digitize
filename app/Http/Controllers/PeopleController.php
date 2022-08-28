<?php

namespace App\Http\Controllers;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{

    public function getCreatePage(){
        return view('create');
    }

    public function createPeople(Request $request){
        People::create([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'category' => $request->category,
        ]);
        return redirect(route('getCreatePage'));
    }

    //
}
