<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Complains;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    //
    public function index(User $id,Complains $complains, Request $request)
    {
        $user = User::find(Auth::user()->id);
        $complain = Complains::withTrashed()->where("user_id", "=", Auth::user()->id)->get();
        // dd($complain);
        return view('history', compact('complain', 'user'));
    }
    public function destroyIndia(int $id, Request $request)
    {
        $complain =Complains::withTrashed()->find($id);
        $complain->forceDelete();
        return back()->with('toast_success','Deleted!');
    }
}