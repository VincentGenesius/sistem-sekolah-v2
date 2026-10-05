<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])->get();

        return view('students.index', [
            'title'=> $title,
            'students'=> $students,
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Siswa';

        return view('students.create', [
            'title'=> $title
        ]);
    }

    public function store()
    {
        $validatedRequests = request()->validate([
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis'],
            'name' => ['required', 'string'],
            'gender' => ['required', 'string','in:Laki-laki,Perempuan'],
            'major' => ['required', 'string', 'in:AKL,BiD,TKJ'],
            'class' => ['required', 'string'],
        ]);

        Student::create($validatedRequests);

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        $title = 'Sistem Sekolah - Detail Siswa';

        return view('students.show', [
            'title'=> $title,
            'student'=> $student
        ]);
    }

    public function edit(Student $student)
    {
        $title = 'Sistem Sekolah - Edit Siswa';

        return view('students.edit', [
            'title'=> $title,
            'student'=> $student
        ]);
    }

    public function update(Student $student, Request $request)
    {
        $validatedRequests = $request->validate([
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis,' . $student->id],
            'name' => ['required', 'string'],
            'gender' => ['required', 'string','in:Laki-laki,Perempuan'],
            'major' => ['required', 'string', 'in:AKL,BiD,TKJ'],
            'class' => ['required', 'string'],
        ]);

        $student->update($validatedRequests);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
