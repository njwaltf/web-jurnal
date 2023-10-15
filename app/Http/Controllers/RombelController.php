<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use App\Http\Requests\StoreRombelRequest;
use Barryvdh\DomPDF\Facade\PDF;
use App\Http\Requests\UpdateRombelRequest;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $title = 'Data Rombel | Web Jurnal';

    public function index()
    {
        return view('dashboard.rombel.index', [
            'rombels' => Rombel::all(),
            'title' => $this->title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.rombel.create', [
            'title' => $this->title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRombelRequest $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:100']
        ]);

        Rombel::create($validatedData);
        return redirect('/dashboard/rombel')->with('success', 'Rombel berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rombel $rombel)
    {
        return view('dashboard.rombel.edit', [
            'title' => $this->title,
            'rombel' => $rombel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRombelRequest $request, Rombel $rombel)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:100']
        ]);
        $rombel = Rombel::where('id', $rombel->id)->update($validatedData);
        return redirect('/dashboard/rombel/')->with('successEdit', "Data rombel berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rombel $rombel)
    {
        Rombel::destroy($rombel->id);
        return redirect('/dashboard/rombel')->with('successDelete', 'Data rombel berhasil dihapus!');
    }

    public function exportPDF()
    {
        $rombels = Rombel::all();
        $data['rombels'] = $rombels;
        $pdf = PDF::loadView('pdf.rombels', $data);
        return $pdf->stream();
    }
}