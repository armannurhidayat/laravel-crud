<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Kelas;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; //Query Builder

class StudentController extends Controller {
    

    public function index() {
        $students = Student::all();
        return view('student.index', compact('students'));
    }


    public function create() {
        $kelas = Kelas::all();
        return view('student.form', compact('kelas'));
    }

    
    public function store(Request $request) {
        $request->validate([
            'nama'      => 'required',
            'kelas_id'  => 'required',
            'alamat'    => 'required',
        ]);
        
        $student = new Student();

        $student->nama = $request->nama;
        $student->kelas_id = $request->kelas_id;
        $student->alamat = $request->alamat;

        $student->save();
        return redirect()->route('student.index')->with('add', 'Data Berhasil Ditambah');
    }


    public function show($id) {
        $kelas = Kelas::all();
        $student = Student::find($id);
        return view('student.show', compact('student', 'kelas'));
    }


    public function edit($id) {
        $kelas = Kelas::all();
        $student = Student::find($id);
        return view('student.show', compact('student', 'kelas'));
    }


    public function update(Request $request, $id) {
        $request->validate([
            'nama'      => 'required',
            'kelas_id'  => 'required',
            'alamat'    => 'required',
        ]);

        $student = Student::find($id);

        $student->update([
            'nama' => request('nama'),
            'kelas_id' => request('kelas_id'),
            'alamat' => request('alamat')
        ]);
        
        return redirect()->route('student.index')->with('update', 'Data Berhasil Diupdate');
    }


    public function destroy($id) {
        $student = Student::find($id);
        if ($student->Delete()) {
            return redirect()->route('student.index')->with('delete', 'Data Berhasil Didelete');
        }
    }
}
