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
        // Check Team Detail 
        $teamDetail = $call;
        if ($teamDetail == 'infra'){
            $teamDetail = 'INFRA';
        } elseif ($teamDetail == 'pc') {
            $teamDetail = 'p/c';
        } elseif ($teamDetail == 'mes') {
            $teamDetail = 'MES';
        }

        $name = 'Team pc';
        $team = User::where('team', 'like', "%$teamDetail%")
            ->with(['UserReport', 'Family'])
            ->get();
        $total = $team->count();
        $total_family = $team->count('Family');
        $report_status = 0;

        // Data Employee
        $employees = DB::select('SELECT emp_id,name FROM mst_employee WHERE team = "'.$teamDetail.'"');

        // Group by emp_id for personal report 
        $empCollect = '';
        $i = 0;
        foreach ($employees as $value) {
            $empCollect .= $value->emp_id.',';
            
            // defualt value for column
            $employees[$i]->m_visit = $employees[$i]->report_time = $employees[$i]->submit = NULL;
            $employees[$i]->f_voc = $employees[$i]->f_flue = $employees[$i]->f_fever = $employees[$i]->f_cough = $employees[$i]->m_flue = $employees[$i]->m_fever = $employees[$i]->m_cough = $employees[$i]->m_voc = 0;
            $employees[$i]->f_visit = null;
            $i++;
        }
        
        // Get Data Family by Employee ID
        for ($i=0; $i < count($employees); $i++) { 
            $empFamily = DB::select('SELECT id FROM mst_family_member WHERE emp_id = "'.$employees[$i]->emp_id.'"');
            $families = '';
            if (count($empFamily) > 0) {
                foreach ($empFamily as $iey) {
                    $families .= $iey->id.',';
                }
                $employees[$i]->families = substr($families, 0, (strlen($families)-1));
            } else {
                $employees[$i]->families = NULL;
            }
        }

        // Health Report Employee
        $empHealth = DB::select('SELECT emp_id,report_time,cough,fever,flue,visiting,visit_oth_city FROM tr_employee_reporting WHERE emp_id IN ('.substr($empCollect, 0, (strlen($empCollect)-1)).')');
        
        for ($i=0; $i < count($employees); $i++) { 
            for ($j=0; $j < count($empHealth); $j++) { 
                if ($employees[$i]->emp_id == $empHealth[$j]->emp_id){
                    $employees[$i]->submit = 1;
                    $employees[$i]->report_time = $empHealth[$j]->report_time;
                    $employees[$i]->m_visit = $empHealth[$j]->visiting;
                    $employees[$i]->m_voc = $empHealth[$j]->visit_oth_city;
                    $employees[$i]->m_cough = $empHealth[$j]->cough;
                    $employees[$i]->m_fever = $empHealth[$j]->fever;
                    $employees[$i]->m_flue = $empHealth[$j]->flue;
                } 
            }
        }
        // Health Report Family by Employee ID
        for ($i=0; $i < count($employees); $i++) { 
            $families_id = '';
            if ($employees[$i]->families == null) {
                $families_id = 'NULL';
            } else {
                $families_id = $employees[$i]->families;
            }

            $famHealth = DB::select("SELECT time_reporting,cough,fever,flue,visiting,visit_oth_city FROM tr_family_member_reporting WHERE family_id IN (".$families_id.")");

            $countCough = $countFever = $countFlue = 20;
            $visitings = null;
            for ($j=0; $j < count($famHealth); $j++) { 
                if ($famHealth[$j]->cough == 1){
                    $employees[$i]->f_cough = $employees[$i]->f_cough + 1;
                } 
                if ($famHealth[$j]->visit_oth_city == 1){
                    $visitings .= $famHealth[$j]->visiting.',';
                    $employees[$i]->f_voc = 1;
                }
            }
            $visitings = explode(",", substr($visitings, 0, (strlen($visitings)-1)));
            $employees[$i]->f_visit = implode(",",array_unique($visitings));
        }

        $empFamilies = DB::select('SELECT COUNT(emp.emp_id) noFamilies FROM mst_employee emp LEFT JOIN mst_family_member f ON f.emp_id = emp.emp_id GROUP BY emp.emp_id ORDER BY emp.emp_id');
        
        // $progressReport = DB::select('SELECT * FROM tr_employee_reporting WHERE emp_id IN ('.$empCollect.') AND report_time LIKE "2020-04-19%"');
        // $progressReport = count($progressReport);
        $progressReport = 0;

        return view('/detail_health', compact(['team', 'total', 'name', 'total_family', 'report_status','employees', 'empFamilies', 'progressReport']));

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
