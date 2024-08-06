<?php

namespace App\Http\Controllers;

use App\Models\Merge;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class MergeController extends Controller
{

    public function GetAllMerge()
    {
        return Merge::all();
    }

    public function getMerge($id)
    {
        return DB::table('Merge')->where('id', $id)->first();
    }

    public function addMerge(Request $request)
    {
        $request->validate([
            'priority' => 'required',
            'from' => 'required',
            'package_name' => 'required',
            'merge' => 'required',
            'activity_status' => 'required',
        ]);
        $merge = DB::table('Merge')->insert([
            'priority' => $request->priority,
            'from' => $request->from,
            'package_name' => $request->package_name,
            'merge' => $request->merge,
            'activity_status' => $request->activity_status,
        ]);
        return response()->json([
            'merge' => $merge,
        ], 200);
    }

    public function editMerge(Request $request, $id)
    {
        $request->validate([
            'priority' => 'required',
            'from' => 'required',
            'package_name' => 'required',
            'merge' => 'required',
            'activity_status' => 'required',
        ]);
        $merge = Merge::findOrFail($id);
        $merge->priority = $request->priority;
        $merge->from = $request->from;
        $merge->package_name = $request->package_name;
        $merge->merge = $request->merge;
        $merge->activity_status = $request->activity_status;
        $merge->save();
    }

    public function destroy($id)
    {
        return Merge::findOrFail($id)->delete();
    }


}

