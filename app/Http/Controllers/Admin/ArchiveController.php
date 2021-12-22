<?php

namespace App\Http\Controllers\Admin;

use App\Models\Complains;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class ArchiveController extends Controller
{
    //
    public function index(Complains $complains)
    {
        $complains = Complains::onlyTrashed()->paginate(10);
        return view('admin.archive', compact('complains'));
    }
    public function destroy(int $id, Request $request)
    {
        $complain =Complains::withTrashed()->find($id);
        $complain->forceDelete();
        return back()->with('toast_success','Deleted!');
    }
    public function restore(int $id, Request $request)
    {
        $complain =Complains::withTrashed()->find($id);
        $complain->restore();
        return back()->with('toast_success','Restored!');
    }
    public function destroyAll(Complains $id)
    {
        Complains::onlyTrashed()->forceDelete();
        Alert::toast('Data Deleted Successfully!', 'success');
        return back();
    }
    public function restoreAll(Complains $id)
    {
        Complains::onlyTrashed()->restore();
        Alert::toast('Data Restored Successfully!', 'success');
        return back();
    }
}