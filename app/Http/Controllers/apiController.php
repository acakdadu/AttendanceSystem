<?php

namespace App\Http\Controllers;

use App\FamilyReport;
use App\User;
use App\UserReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class apiController extends Controller
{

    // Password
    public function auth(Request $request)
    {
        if (!Auth::attempt([
            'emp_id' => $request->emp_id,
            'password' => $request->password
        ])) {
            return response()->json(['Error' => 'Credential is Wrong!'], 401);
        }
        return response()->json(['Success' => 'Data Found!'], 200);
    }

    // get all data
    public function index()
    {

        // $conn = DB::table('mst_employee')
        //     ->join('mst_family_member', 'mst_employee.emp_id', '=', 'mst_family_member.emp_id')
        //     // ->join('mst_family_member', 'mst_family_member.emp_id', '=', 'mst_employee.emp_id')
        //     ->select('mst_employee.name', 'mst_employee.emp_id', 'mst_family_member.relation' )
        //     ->orderBy('mst_employee.emp_id','DESC')
        //     ->get();

        // $conn = User::all();
        $conn = User::with(['UserReport', 'Family'])
            ->get();

        if ($conn) {
            $status = ([
                'status' => '200 OK',
                'response' => $conn
            ]);
        }
        return response()->json($status);
    }

    // Create New Employee Data
    public function store(Request $request)
    {
        $new_data = User::create([
            'emp_id' => $request->emp_id,
            'name' => $request->name,
            'company' => $request->company,
            'department' => $request->department,
            'team' => $request->team,
            'plant' => $request->plant,
            'password' => bcrypt($request->password),
            'level' => $request->level
        ]);
        return response()->json('Berhasil Menambahkan Pegawai', 201);
    }

    //    Show data employe order by emp_id
    public function show(User $user, $emp_id)
    {
        $getemp = User::with(['UserReport', 'Family', 'Family.FamilyReport'])
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

    // check employee add
    public function empcheck(Request $request)
    {
        $get_check = UserReport::updateOrCreate(
            [
                'emp_id' => $request->emp_id,
                'report_time' => date('Y-m-d'), //1 hari sekali, selain itu di update. nanti get data kapan dia updatenya pake updated_at
            ],
            [
                'cough' => $request->cough,
                'fever' => $request->fever,
                'flue' => $request->flue,
                'temperature' => $request->temperature,
                'visiting' => $request->visiting,
                'gps_location' => $request->gps_location,
                'visit_oth_city' => $request->visit_oth_city,

            ]
        );

        if (!$get_check) {
            return response()->json(['Error' => 'Record Error, Try Again!'], 401);
        }
        return response()->json(['Success' => 'Record Succesfully!'], 201);
    }

    // check employee view
    public function empcheckshow($emp_id)
    {
        $getemp = UserReport::with(['User'])
            ->where('emp_id', $emp_id)
            ->get();
        return response()->json($getemp, 200);
    }

    // Family's symptomp new
    public function famcheck(Request $request)
    {
        $get_check = FamilyReport::updateOrCreate(
            [
                'emp_id' => $request->emp_id,
                'name' => $request->name,
                'time_reporting' => date('Y-m-d'), //1 hari sekali, selain itu di update. nanti get data kapan dia updatenya pake updated_at
            ],
            [
                'cough' => $request->cough,
                'fever' => $request->fever,
                'flue' => $request->flue,
                'temperature' => $request->temperature,
                'visiting' => $request->visiting,
                'visit_oth_city' => $request->visit_oth_city,
            ]
        );

        if (!$get_check) {
            return response()->json(['Error' => 'Record Error, Try Again!'], 401);
        }
        return response()->json(['Success' => 'Record Succesfully!'], 201);
    }


    // View Symptom Family's Employe
    public function famcheckshow($emp_id)
    {
        $getemp = FamilyReport::find($emp_id)
            ->with(['User'])
            ->get();
        return response()->json($getemp, 200);
    }
}
