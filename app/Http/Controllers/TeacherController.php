<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
// use App\Models\Rombel;
use App\Models\Teacher;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreTeacherRequest;
use Barryvdh\DomPDF\Facade\PDF;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $title = 'Data Guru | Web Jurnal';

    public function index()
    {
        return view('dashboard.guru.index', [
            'teachers' => Teacher::all(),
            'title' => $this->title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.guru.create', [
            'title' => $this->title,
            'mapels' => Mapel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:100'],
            'nip' => ['required', 'unique:teachers'],
            'mapel_id' => ['required', 'max:1'],
        ]);

        Teacher::create($validatedData);
        return redirect('/dashboard/teacher')->with('success', 'Guru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('dashboard.guru.edit', [
            'title' => $this->title,
            'mapels' => Mapel::all(),
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:100'],
            'nip' => ['required'],
            'mapel_id' => ['required', 'max:1'],
        ]);
        $teacher = Teacher::where('id', $teacher->id)->update($validatedData);
        return redirect('/dashboard/teacher/')->with('successEdit', "Data Guru berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        Teacher::destroy($teacher->id);
        return redirect('/dashboard/teacher')->with('successDelete', 'Data Guru berhasil dihapus!');
    }

    public function exportPDF()
    {
        $teachers = Teacher::all();
        $data['teachers'] = $teachers;
        $pdf = PDF::loadView('pdf.teachers', $data);
        return $pdf->stream();
    }
}