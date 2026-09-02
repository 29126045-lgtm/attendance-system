<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Latetime;
use App\Models\Attendance;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // ===== STATISTIK KAD =====
        $totalEmp = Employee::count();
        
        $today = Carbon::today()->toDateString();
        
        $ontimeEmp = Attendance::whereDate('attendance_date', $today)
                               ->where('status', 'on_time')
                               ->count();
        
        $latetimeEmp = Attendance::whereDate('attendance_date', $today)
                                 ->where('status', 'late')
                                 ->count();
        
        $AllAttendance = $ontimeEmp + $latetimeEmp;
        
        if ($AllAttendance > 0) {
            $percentageOntime = round(($ontimeEmp / $totalEmp) * 100, 2);
        } else {
            $percentageOntime = 0;
        }
        
        $data = [$totalEmp, $ontimeEmp, $latetimeEmp, $percentageOntime];
        
        // ===== DATA UNTUK GRAF BULANAN =====
        $monthlyAttendance = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyAttendance[] = Attendance::whereMonth('attendance_date', $i)
                                             ->whereYear('attendance_date', date('Y'))
                                             ->count();
        }
        
        return view('admin.index')->with([
            'data' => $data,
            'monthlyAttendance' => $monthlyAttendance
        ]);
    }
}