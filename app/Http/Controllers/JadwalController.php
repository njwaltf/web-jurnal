<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Models\Jurusan;
use App\Models\Mapel;
use App\Models\Rombel;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Teacher;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $title = 'Data Jadwal | Web Jurnal';

    public function index()
    {
        return view('dashboard.jadwal.index', [
            'jadwal1' => Jadwal::where([
                ['rombel_id', '=', auth()->user()->rombel_id]
            ])->get(),
            'jadwals' => Jadwal::all(),
            'title' => $this->title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.jadwal.create', [
            'title' => $this->title,
            'teachers' => Teacher::all(),
            'rombels' => Rombel::all(),
            'mapels' => Mapel::all(),
            'jurusans' => Jurusan::where('name', '!=', 'Umum')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJadwalRequest $request)
    {
        $validatedData = $request->validate([
            'day' => ['required', 'max:100'],
            'teacher_id' => ['required'],
            'rombel_id' => ['required'],
            'mapel_id' => ['required'],
            'jurusan_id' => ['required'],
            'start' => ['required'],
            'finish' => ['required'],
        ]);

        Jadwal::create($validatedData);
        return redirect('/dashboard/jadwal')->with('success', 'Jadwal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        return view('dashboard.jadwal.edit', [
            'title' => $this->title,
            'teachers' => Teacher::all(),
            'mapels' => Mapel::all(),
            'rombels' => Rombel::all(),
            'jurusans' => Jurusan::where('name', '!=', 'Umum')->get(),
            'jadwal' => $jadwal
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        $validatedData = $request->validate([
            'day' => ['required', 'max:100'],
            'teacher_id' => ['required'],
            'rombel_id' => ['required'],
            'mapel_id' => ['required'],
            'jurusan_id' => ['required'],
            'start' => ['required'],
            'finish' => ['required'],
        ]);

        $jadwal = Jadwal::where('id', $jadwal->id)->update($validatedData);
        return redirect('/dashboard/jadwal/')->with('successEdit', "Data jadwal berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        Teacher::destroy($jadwal->id);
        return redirect('/dashboard/jadwal')->with('successDelete', 'Data jadwal berhasil dihapus!');
    }

    public function exportPDF()
    {
        $jadwals = Jadwal::all();
        $data['jadwals'] = $jadwals;
        $pdf = PDF::loadView('pdf.jadwals', $data);
        return $pdf->stream();
    }
}