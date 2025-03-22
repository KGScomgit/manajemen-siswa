<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index(){
        $siswa = Auth::user()->id;
         
        return Inertia::render('Index');
        
    }

    public function create(){
        return Inertia::render('Create');
    }


    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'nis' => 'required | unique',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required'   
        ]);

        $siswa = Auth::user()->id; 
        Siswa::create([
            'user_id' => $siswa,
            'nama' => $request['nama'],
            'nis' => $request['nis'],
            'kelas' => $request['kelas'],
            'jurusan' => $request['jurusan'],
            "alamat" => $request['alamat']
        ]);
            return redirect()->route('siswa.index');
        }
} 


