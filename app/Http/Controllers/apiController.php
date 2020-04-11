<?php

namespace App\Http\Controllers;

use App\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class apiController extends Controller
{

    // get all data
    public function index()
    {
        $conn = Api::all();
        return response()->json($conn);
    }

    // Create New Employee Data
    public function store(Request $request)
    {
        $new_data = Api::create([
            'emp_id' => $request->emp_id,
            'name' => $request->name,
            'company' => $request->company,
            'department' => $request->department,
            'team' => $request->team,
            'plant' => $request->plant,
            'password' => $request->password,
            'level' => $request->level
        ]);
        return response()->json('Berhasil Menambahkan Pegawai', 201);
    }

    //    Show data employe order by emp_id
    public function show(Api $api, $emp_id)
    {
        $getemp = DB::table('mst_employee')
            ->where('emp_id', $emp_id)
            ->get();
        return response()->json($getemp, 200);
    }

    //   update data
    public function update(Request $request, $emp_id)
    {
        $update = DB::table('mst_employee')->where('emp_id', $emp_id)->update([
            'emp_id' => $request->emp_id,
            'name' => $request->name,
            'company' => $request->company,
            'department' => $request->department,
            'team' => $request->team,
            'plant' => $request->plant,
            'password' => $request->password,
            'level' => $request->level
        ]);
        return response()->json('Data berhasil di Update', 200);
    }

    // delete data employee
    public function destroy($emp_id)
    {
        DB::table('mst_employee')->where('emp_id', $emp_id)->delete();
        return response()->json('Berhasil di hapus', 200);
    }
}
