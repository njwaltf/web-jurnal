<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Http\Requests\StoreMapelRequest;
use Barryvdh\DomPDF\Facade\PDF;
use App\Http\Requests\UpdateMapelRequest;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $title = 'Data Mapel | Web Jurnal';

    public function index()
    {
        return view('dashboard.mapel.index', [
            'mapels' => Mapel::all(),
            'title' => $this->title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.mapel.create', [
            'title' => $this->title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMapelRequest $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:100']
        ]);

        Mapel::create($validatedData);
        return redirect('/dashboard/mapel')->with('success', 'Mapel berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        return view('dashboard.mapel.edit', [
            'title' => $this->title,
            'mapel' => $mapel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMapelRequest $request, Mapel $mapel)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:100']
        ]);
        $mapel = Mapel::where('id', $mapel->id)->update($validatedData);
        return redirect('/dashboard/mapel/')->with('successEdit', "Data mapel berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        Mapel::destroy($mapel->id);
        return redirect('/dashboard/mapel')->with('successDelete', 'Data mapel berhasil dihapus!');
    }

    public function exportPDF()
    {
        $mapels = Mapel::all();
        $data['mapels'] = $mapels;
        $pdf = PDF::loadView('pdf.mapels', $data);
        return $pdf->stream();
    }
}