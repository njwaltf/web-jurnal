<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
// use App\Models\Rombel;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Jurusan;
use App\Models\Mapel;
use App\Models\Teacher;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Routing\Controller;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $title = 'Data Guru | Web Jurnal';

    public function index()
    {
        return view('dashboard.guru.index', [
            'all_teachers' => Teacher::all(),
            'teachers' => Teacher::where('jurusan_id', auth()->user()->jurusan_id)
                ->orWhere('jurusan_id', 6)->get(),
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
            'jurusans' => Jurusan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $validatedData = $request->validate([
            'teacher_name' => ['required', 'max:100'],
            'nip' => ['required', 'unique:teachers'],
            'jurusan_id' => ['required']
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
            'jurusans' => Jurusan::all(),
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $validatedData = $request->validate([
            'teacher_name' => ['required', 'max:100'],
            'nip' => ['required'],
            'jurusan_id' => ['required'],
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