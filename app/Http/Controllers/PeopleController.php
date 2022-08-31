<?php

namespace App\Http\Controllers;
use App\Http\Requests\PeopleRequest;
use App\Models\People;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{

    public function getCreatePage(){
        $peoples = People::all();
        return view('viewParticipant', ['peoples'=>$peoples]);
    }

    public function createPeople(PeopleRequest $request){

        $extension = $request->file('addImage')->getClientOriginalExtension();
        $fileName = $request->addName.'_'.$request->addCategory.'.'.$extension;//rename image
        $request->file('addImage')->storeAs('public/addImage/', $fileName);//save image

        People::create([
            'addName' => $request->addName,
            'addEmail' => $request->addEmail,
            'addDob' => $request->addDob,
            'addImage'=> $fileName,
            'addCategory' => $request->addCategory,
        ]);
        return redirect(route('getCreatePage'));
    }

    public function getPeople(){
        $peoples = People::all();
        return view('viewParticipant', ['peoples'=> $peoples]);
    }

    public function searchPeople(Request $request){
        $cari = $request->cari;
        $peoples = People::where('addName', 'like', '%'.$cari.'%')
            ->orWhere('addCategory', 'like', '%'.$cari.'%')
            ->orWhere('addEmail', 'like', '%'.$cari.'%')
            ->paginate();
        $peoples->withPath('');
        $peoples->appends($request->all());
        return view('viewParticipant', compact('peoples', 'request'));
    }


    public function getPeopleById($id) {
        $people = People::find($id);
        return view('updateParticipant', ['people' => $people]);
    }

    public function updatePeople(PeopleRequest $request, $id) {
        $people = People::find($id);

        $extension = $request->file('addImage')->getClientOriginalExtension();
        $fileName = $request->addName.'_'.$request->addCategory.'.'.$extension;//rename image
        $request->file('addImage')->storeAs('public/addImage/', $fileName);//save image


        $people -> update([
            'addName' => $request->addName,
            'addEmail' => $request->addEmail,
            'addDob' => $request->addDob,
            'addCategory' => $request->addCategory,
            'addImage'=> $fileName
        ]);

        return redirect(route('getPeople'));
    }


    public function deletePeople($id){
        People::destroy($id);
        return redirect(route('getPeople'));
    }

    //
}
