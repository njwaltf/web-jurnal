<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Rombel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public $title = 'Web Jurnal | SMKN 40 Jakarta';
    public function index()
    {
        return view('dashboard.dashboard', [
            'title' => "Dashboard | Web Jurnal",
            'rombel_name' => Rombel::where('id', auth()->user()->rombel_id)->get()
        ]);
    }
    public function dashboard()
    {
        $data1 = Jurnal::join('jadwals', 'jadwals.id', '=', 'jurnals.jadwal_id')
            ->join('teachers', 'teachers.id', '=', 'jadwals.teacher_id')
            ->join('mapels', 'mapels.id', '=', 'jadwals.mapel_id')
            ->join('rombels', 'rombels.id', '=', 'jurnals.rombel_id')
            ->get(['jurnals.date', 'teachers.teacher_name', 'mapels.mapel_name', 'jurnals.kd', 'jurnals.date', 'jurnals.material', 'jurnals.task', 'jurnals.sakit', 'jurnals.izin', 'jurnals.alpha', 'jurnals.hadir', 'jurnals.detail', 'jurnals.id', 'rombels.name']);
        return view('dashboard', [
            // 'jurnals' => Jurnal::where('rombel_id', auth()->user()->rombel_id)->get(),
            'data' => $data1,
            'title' => $this->title
        ]);
    }
}