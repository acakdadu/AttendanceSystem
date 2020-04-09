<?php

namespace App\Http\Controllers;

use App\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class apiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $conn = Api::all();
        return response()->json($conn);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Api  $api
     * @return \Illuminate\Http\Response
     */
    public function show(Api $api,$emp_id)
    {
        $getemp = DB::table('mst_employee')
        ->where('emp_id', $emp_id)
        ->get();
        return response()->json($getemp,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Api  $api
     * @return \Illuminate\Http\Response
     */
    public function edit(Api $api)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Api  $api
     * @return \Illuminate\Http\Response
     */
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

                return response()->json('Data berhasil di Update',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Api  $api
     * @return \Illuminate\Http\Response
     */
    public function destroy($emp_id)
    {
        $delete = DB::table('mst_employee')->where('emp_id', $emp_id)->delete();
        return response()->json('Berhasil di hapus',200);
    }
}
