<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Complains;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ComplainController extends Controller
{
    //
    public function index(Complains $complain)
    {
        $complains = Complains::latest()->paginate(10);
        return view('admin.complain', compact('complains'));
    }
    public function destroyIndia(int $id, Request $request)
    {
        $complain = Complains::find($id);
        // dd($complain);
        $complain->delete();
        Alert::toast('Approved and moved to archives!', 'success');
        return back();
    }
}