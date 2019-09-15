<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Menyalakan Query Builder

class KelasController extends Controller {


    public function index() {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }


    public function create() {
        return view('kelas.form');
    }


    public function store(Request $request) {
        // Validasi Inputan
        $request->validate([
            'nama' => 'required|max:4'
        ]);

        // Cara Insert Data 1
        // $kelas = new Kelas();
        // $kelas->nama = $request->nama;
        // if ($kelas->save()) {
        //     return redirect()->route('kelas.index')->with('add', 'Data Berhasil Ditambahkan');
        // }


        // Cara Insert Data Mass asigment
        $kelas = Kelas::create([
        	'nama' => $request->nama
        ]);
        return redirect()->route('kelas.index')->with('add', 'Data Berhasil Ditambahkan');

    }

    
    public function show($id) {
        $kelas = Kelas::find($id);
        return view('kelas.show', compact('kelas'));
    }

    
    public function edit($id) {
        $kelas = Kelas::find($id);
        return view('kelas.show', compact('kelas'));
    }

    
    public function update(Request $request, $id) {

        $request->validate([
            'nama' => 'required|max:4'
        ]);

        $kelas = Kelas::find($id);

        $kelas->update([
            'nama' => request('nama')
        ]);

        return redirect()->route('kelas.index')->with('update', 'Data Berhasil Diupdate');
        
    }

    
    public function destroy(Kelas $kelas, $id) {
    	// Cara Delete 1
        // $kelas = Kelas::find($id);
        // if ($kelas->Delete()) {
        //     return redirect()->route('kelas.index')->with('delete', 'Data Berhasil Dihapus');
        // }

        Kelas::destroy($id);
        return redirect()->route('kelas.index')->with('delete', 'Data Berhasil Dihapus');
    }
}
