<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJurnalRequest;
use App\Http\Requests\UpdateJurnalRequest;
use App\Models\Jadwal;
use App\Models\Jurnal;
use App\Models\Mapel;
// use App\Models\Rombel;
use App\Models\Teacher;
use Illuminate\Routing\Controller;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $title = 'Jurnal Harian | Web Jurnal';

    public function index()
    {
        $data = Jurnal::join('jadwals', 'jadwals.id', '=', 'jurnals.jadwal_id')
            ->join('teachers', 'teachers.id', '=', 'jadwals.teacher_id')
            ->join('mapels', 'mapels.id', '=', 'jadwals.mapel_id')
            ->get(['jurnals.date', 'teachers.teacher_name', 'mapels.mapel_name', 'jurnals.kd', 'jurnals.date', 'jurnals.material', 'jurnals.task', 'jurnals.sakit', 'jurnals.izin', 'jurnals.alpha', 'jurnals.hadir', 'jurnals.detail', 'jurnals.id']);
        return view('dashboard.jurnal.index', [
            // 'jurnals' => Jurnal::where('rombel_id', auth()->user()->rombel_id)->get(),
            'jurnals' => $data,
            'title' => $this->title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.jurnal.create', [
            'title' => $this->title,
            'jadwals' => Jadwal::where([
                ['rombel_id', '=', auth()->user()->rombel_id]
            ])->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJurnalRequest $request)
    {
        $validatedData = $request->validate([
            'date' => ['required', 'max:100'],
            'jadwal_id' => ['required'],
            'rombel_id' => ['required'],
            'kd' => ['nullable'],
            'material' => ['nullable'],
            'task' => ['nullable'],
            'sakit' => ['nullable'],
            'izin' => ['nullable'],
            'hadir' => ['nullable'],
            'alpha' => ['nullable'],
            'detail' => ['nullable'],
        ]);

        Jurnal::create($validatedData);
        return redirect('/dashboard/jurnal')->with('success', 'Jurnal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurnal $jurnal)
    {
        // $data = Jurnal::join('jadwals', 'jadwals.id', '=', 'jurnals.jadwal_id')
        //     ->join('teachers', 'teachers.id', '=', 'jadwals.teacher_id')
        //     ->join('mapels', 'mapels.id', '=', 'jadwals.mapel_id')
        //     ->join('rombels', 'rombels.id', '=', 'jadwals.rombel_id')
        //     ->where('id', $jurnal->id)
        //     ->get(['jurnals.date', 'teachers.teacher_name', 'mapels.mapel_name', 'jurnals.kd', 'jurnals.date', 'jurnals.material', 'jurnals.task', 'jurnals.sakit', 'jurnals.izin', 'jurnals.alpha', 'jurnals.hadir', 'jurnals.detail', 'jurnals.id']);
        // return view('dashboard.jurnal.show', [
        //     'title' => $this->title,
        //     'jurnal' => $data
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurnal $jurnal)
    {
        return view('dashboard.jurnal.edit', [
            'title' => $this->title,
            'jadwals' => Jadwal::where([
                ['rombel_id', '=', auth()->user()->rombel_id]
            ])->get(),
            'jurnal' => $jurnal
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJurnalRequest $request, Jurnal $jurnal)
    {
        $validatedData = $request->validate([
            'date' => ['required', 'max:100'],
            'jadwal_id' => ['required'],
            'kd' => ['required'],
            'material' => ['required'],
            'task' => ['required'],
            'sakit' => ['nullable'],
            'izin' => ['nullable'],
            'hadir' => ['nullable'],
            'alpha' => ['nullable'],
            'detail' => ['required'],
        ]);

        $jurnal = Jurnal::where('id', $jurnal->id)->update($validatedData);
        return redirect('/dashboard/jurnal/')->with('successEdit', "Data jurnal berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurnal $jurnal)
    {
        Jurnal::destroy($jurnal->id);
        return redirect('/dashboard/jurnal')->with('successDelete', 'Data jurnal berhasil dihapus!');
    }
}