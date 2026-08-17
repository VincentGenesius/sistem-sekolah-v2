<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teachers.index');
    }

    public function show(string $id)
    {
        return view('teachers.show', compact('id'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function edit(string $id)
    {
        return view('teachers.edit');
    }

    public function store()
    {
        return "Melakukan penambahan data guru";
    }

    public function update(string $id)
    {
        return "Melakukan perubahan data guru";
    }

    public function destroy(string $id)
    {
        return "Menghapus data guru";
    }
}
