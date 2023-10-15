<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard', [
            'title' => "Dashboard | Web Jurnal",
            'rombel_name' => Rombel::where('id', auth()->user()->rombel_id)->get()
        ]);
    }
}