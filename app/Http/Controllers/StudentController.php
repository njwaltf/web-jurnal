<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Jurusan;
use App\Models\Rombel;
use Barryvdh\DomPDF\Facade\PDF;

// use PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $title = 'Data Murid | Web Jurnal';
    public function index()
    {
        return view('dashboard.siswa.index', [
            'students' => Student::where('rombel_id', auth()->user()->rombel_id)->get(),
            'all_students' => Student::all(),
            'title' => $this->title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.siswa.create', [
            'title' => $this->title,
            'rombels' => Rombel::all(),
            'jurusans' => Jurusan::where('name', '!=', 'Umum')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validatedData = $request->validate([
            'full_name' => ['required', 'max:100'],
            'nis' => ['required', 'unique:students'],
            'tahun_ajaran' => ['required'],
            'rombel_id' => ['required'],
            'jurusan_id' => ['required']
        ]);

        Student::create($validatedData);
        return redirect('/dashboard/student')->with('success', 'Murid berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('dashboard.siswa.edit', [
            'title' => $this->title,
            'jurusans' => Jurusan::where('name', '!=', 'Umum')->get(),
            'rombels' => Rombel::all(),
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validatedData = $request->validate([
            'full_name' => ['required', 'max:100'],
            'nis' => ['required'],
            'rombel_id' => ['required'],
            'tahun_ajaran' => ['required'],
            'jurusan_id' => ['required']
        ]);
        $student = Student::where('id', $student->id)->update($validatedData);
        return redirect('/dashboard/student/')->with('successEdit', "Data Murid berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/dashboard/student')->with('successDelete', 'Data Murid berhasil dihapus!');
    }

    public function exportPDF()
    {
        $students = Student::all();
        $data['students'] = $students;
        $pdf = PDF::loadView('pdf.students', $data);
        return $pdf->stream();
    }
}