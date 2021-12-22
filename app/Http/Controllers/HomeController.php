<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Validation\Validator;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' =>'required|string',
            'email'=>'required|email|string|max:255',
            'phone' =>'required|string',
            'address' =>'required|string',
            'username' =>'required|string',
        ]);
        $user =Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->username = $request['username'];
        $user->phone = $request['phone'];
        $user->address = $request['address'];
        //$user->image = $request['image'];
        $user->save();
        return back()->with('toast_success','Profile Updated');
    }
}