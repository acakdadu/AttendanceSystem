<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{

    public function dashboard()
    {
        // All Employee, data sick, healthy and report time
        $totalemp = User::all();
        $healthyemp_good = DB::table('tr_employee_reporting')
            ->where('report_time', 'like', date('Y-m-d') . '%')
            ->where('cough', 0)
            ->where('fever', 0)
            ->where('flue', 0)
            ->count();
        $healthyemp_sick = DB::table('tr_employee_reporting')
            ->where('report_time', 'like', date('Y-m-d') . '%')
            ->where(function ($q) {
                $q->where('cough', 1)
                    ->orWhere('fever', 1)
                    ->orWhere('flue', 1);
            })
            ->count();

        $reportingemp = DB::table('tr_employee_reporting')->where('report_time', 'like', date('Y-m-d') . '%')->count();

        $progress = number_format(round($reportingemp / count($totalemp) * 100, 0), 0);
        // dd($progress);
        return view('/dashboard', (compact(['totalemp', 'healthyemp_sick', 'healthyemp_good', 'progress'])));
    }

    public function healthempdetail($call)
    {
        // INFRA
        if ($call === 'infra') {
            $name = 'Team Infra';
            $team = User::where('team', 'like', '%infra%')
                ->with(['UserReport', 'Family', 'FamilyReport'])
                ->get();
            $total = $team->count();
            $total_family = $team->count('Family');

            foreach ($team as $UReport) {
                foreach ($UReport['UserReport'] as $userreport) {
                    $report_submit = substr($userreport['report_time'], 0, 10);
                    $today = date('Y-m-d');

                    if ($report_submit == $today) {
                        $report_status = 1;
                    } else {
                        $report_status = 0;
                    }
                }
            }
            return view('/detail_health', compact(['team', 'total', 'name', 'total_family', 'report_status']));
        } elseif ($call === 'pc') {
            $name = 'Team pc';
            $team = User::where('team', 'like', '%p/c%')
                ->with(['UserReport', 'Family', 'FamilyReport'])
                ->get();
            $total = $team->count();
            $total_family = $team->count('Family');

            foreach ($team as $UReport) {
                foreach ($UReport['UserReport'] as $userreport) {
                    $report_submit = substr($userreport['report_time'], 0, 10);
                    $today = date('Y-m-d');

                    if ($report_submit == $today) {
                        $report_status = 1;
                    } else {
                        $report_status = 0;
                    }
                }
            }
            return view('/detail_health', compact(['team', 'total', 'name', 'total_family', 'report_status']));
        } elseif ($call === 'mes') {
            $name = 'Team mes';
            $team = User::where('team', 'like', '%mes%')
                ->with(['UserReport', 'Family', 'FamilyReport'])
                ->get();
            $total = $team->count();
            $total_family = $team->count('Family');

            foreach ($team as $UReport) {
                foreach ($UReport['UserReport'] as $userreport) {
                    $report_submit = substr($userreport['report_time'], 0, 10);
                    $today = date('Y-m-d');

                    if ($report_submit == $today) {
                        $report_status = 1;
                    } else {
                        $report_status = 0;
                    }
                }
            }
            return view('/detail_health', compact(['team', 'total', 'name', 'total_family', 'report_status']));
        }
    }



    public function employees()
    {
        $dataemp = User::with(['Family'])->get();
        $totalfamily = User::with(['Family'])->count();
        // $dataemp = User::all();
        return view('/employees', (compact(['dataemp', 'totalfamily'])));
    }





















































    // GENEREATE RESET PASSWORD => EMPM_ID
    public function generate()
    {
        // cara 1
        $userx = User::where('department', 'LIKE', 'BPC' . '%')->get();
        // dd($userx);
        // $userx = User::all();
        foreach ($userx as $user) {
            $user->password = bcrypt($user->emp_id);
            $user->save();
            return redirect('/dashboard')->with('success', 'Success change Password to Default!');
        }

        // cara2
        // $user =       DB::table('mst_employee')->where(DB::raw('emp_id'), 'LIKE', 101511 . '%')
        //     ->update(['password' => '']);
        // return response()->json('Success Reset ' . $user . ' User');
    }
}
