<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Complains;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Validation\Validator;



class ComplaintController extends Controller
{
    //
    public function index(){
        return view('complaint');
    }
    public function store(Request $request){
        $this->validate($request, [
            'department'=>'required|max:255',
            'category'=>'required|max:255',
            'course_and_section'=>'required|max:255',
            'body'=>'required',
            'image'=>'required',
        ]);
        Complains::create([
            'user_id' => auth()->id(),
            'department' =>request('department'),
            'category' =>request('category'),
            'course_and_section' => request('course_and_section'),
            'body' => request('body'),
            'image' => request('image'),
        ]);
        Alert::toast('Submitted Successfully!','success');
        return redirect()->route('history');
    }
}