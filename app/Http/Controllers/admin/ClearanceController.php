<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clearance;

class ClearanceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $clearances = Clearance::when($search, function ($query, $search) {
            $query->where('student_name', 'like', "%$search%")
                  ->orWhere('department', 'like', "%$search%");
        })->latest()->get();

        return view('admin.clearance', compact('clearances'));
    }

    public function approve($id)
    {
        $clearance = Clearance::findOrFail($id);
        $clearance->status = 'Approved';
        $clearance->save();

        return back()->with('success', 'Approved successfully');
    }

    public function reject($id)
    {
        $clearance = Clearance::findOrFail($id);
        $clearance->status = 'Rejected';
        $clearance->save();

        return back()->with('success', 'Rejected successfully');
    }
}