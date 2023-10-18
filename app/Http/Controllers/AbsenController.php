<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAbsenRequest;
use App\Http\Requests\UpdateAbsenRequest;
use App\Models\Absen;
use App\Models\AbsenDetail;
use App\Models\Student;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $title = 'Data Absensi | Web Jurnal';

    public function index()
    {
        // $dataCount = AbsenDetail::where([
        //     ['attendance', '=', 'Izin'],
        //     ['date_detail', '=', date('Y-m-d')]
        // ]);
        // return $dataCount->count();
        return view('dashboard.absen.index', [
            'absens' => Absen::where('rombel_id', auth()->user()->rombel_id)->get(),
            'title' => $this->title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.absen.create', [
            'title' => $this->title,
            'students' => Student::where('rombel_id', auth()->user()->rombel_id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbsenRequest $request)
    {
        Absen::create([
            'date' => $request->date,
            'rombel_id' => auth()->user()->rombel_id
        ]);
        foreach ($request->student_id as $key => $student_id) {
            // $data = new AbsenDetail();
            $data['student_id'] = $student_id;
            $data['rombel_id'] = $request->rombel_id[$key];
            $data['date_detail'] = $request->date;
            AbsenDetail::create($data);
        }

        return redirect('/dashboard/absen/')->with('success', "Data absen berhasil ditambahkan!");


    }

    /**
     * Display the specified resource.
     */
    public function show(Absen $absen)
    {
        return view('dashboard.absen.show', [
            'title' => $this->title,
            'absen' => $absen,
            // 'absen_details' => AbsenDetail::where('date', $absen->date)->orWhere('rombel_id', auth()->user()->rombel_id)->get(),
            'absen_details' => AbsenDetail::where([
                ['date_detail', '=', $absen->date],
                ['rombel_id', '=', $absen->rombel_id]
            ])->get(),
            'students' => Student::where('rombel_id', auth()->user()->rombel_id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absen $absen)
    {
        return view('dashboard.absen.edit', [
            'title' => $this->title,
            'absen' => $absen,
            // 'absen_details' => AbsenDetail::where('date', $absen->date)->orWhere('rombel_id', auth()->user()->rombel_id)->get(),
            'absen_details' => AbsenDetail::where([
                ['date_detail', '=', $absen->date],
                ['rombel_id', '=', $absen->rombel_id]
            ])->get(),
            'students' => Student::where('rombel_id', auth()->user()->rombel_id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsenRequest $request, Absen $absen)
    {

        // $item = [];
        // foreach ($request as $key => $items) {
        //     $input['student_id'] = $request->student_id[$key];
        //     $input['attendance'] = $request->attendance[$key];
        //     $input['detail'] = $request->detail[$key];
        //     AbsenDetail::create($input);

        // }
        // ddd($request);
        // return $request;
        foreach ($request->student_id as $key => $student_id) {
            // $data = new AbsenDetail();
            $data['student_id'] = $student_id;
            $data['attendance'] = $request->attendance[$key];
            $data['detail'] = $request->detail[$key];
            $data['date_detail'] = $request->date[$key];
            $data['rombel_id'] = $request->rombel_id[$key];
            AbsenDetail::where([
                ['student_id', '=', $request->student_id[$key]],
                ['date_detail', '=', $request->date[$key]],
                ['rombel_id', '=', $request->rombel_id[$key]]
            ])->update($data);
        }
        $hadirCount = AbsenDetail::where([
            ['attendance', '=', 'Hadir'],
            ['date_detail', '=', $absen->date]
        ])->count();

        $izinCount = AbsenDetail::where([
            ['attendance', '=', 'Izin'],
            ['date_detail', '=', $absen->date]
        ])->count();

        $sakitCount = AbsenDetail::where([
            ['attendance', '=', 'Sakit'],
            ['date_detail', '=', $absen->date]
        ])->count();

        $alphaCount = AbsenDetail::where([
            ['attendance', '=', 'Alpha'],
            ['date_detail', '=', $absen->date]
        ])->count();

        Absen::where([
            ['date', '=', $absen->date],
            ['rombel_id', '=', $absen->rombel_id]
        ])->update([
                    'hadir' => $hadirCount,
                    'izin' => $izinCount,
                    'sakit' => $sakitCount,
                    'alpha' => $alphaCount
                ]);
        // return $hadirCount->count();
        return redirect('/dashboard/absen/')->with('successEdit', "Data absen berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absen $absen)
    {
        Absen::destroy($absen->id);
        $whereArray = array('date_detail' => $absen->date, 'rombel_id' => $absen->rombel_id);
        AbsenDetail::whereArray($whereArray)->delete();
        return redirect('/dashboard/absen')->with('successDelete', 'Data absen berhasil dihapus!');
    }
}