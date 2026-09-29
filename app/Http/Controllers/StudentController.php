<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $students = Student::select('id', 'nis', 'name', 'class', 'major')->get();

        return view('students.index', [
            'title'=> $title,
            'students'=> $students,
        ]);
    }

    public function show(string $id)
    {
        $title = 'Sistem Sekolah - Detail Siswa';

        return view('students.show', [
            'title'=> $title
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Siswa';

        return view('students.create', [
            'title'=> $title
        ]);
    }

    public function edit(string $id)
    {
        $title = 'Sistem Sekolah - Edit Siswa';

        return view('students.edit', [
            'title'=> $title
        ]);
    }

    public function store()
    {
        $validatedRequests = request()->validate([
            'nis' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'size:4', 'unique:students,nis'],
            'gender' => ['required', 'string','in:L,P'],
            'class' => ['required', 'string', 'max:50'],
            'major' => ['required', 'string', 'in:AKL,BiD,TKJ'],
        ]);

        Student::create($validatedRequests);

        return redirect()->route('students.index')
            ->with('success', 'Berhasil Menambahkan Data Siswa Baru');
    }

    public function update(string $id)
    {
        return "Melakukan perubahan data siswa";
    }

    public function destroy(string $id)
    {
        return "Menghapus data siswa";
    }
}
