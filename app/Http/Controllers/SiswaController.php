<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
         $siswas = Siswa::where('user_id', $user_id)->get();
        return Inertia::render('Index', [
            'siswas'=> $siswas 
        ]);
        
    }

    public function create(){
        return Inertia::render('Create');
    }


    public function store(Request $request)
        {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required | unique:siswas',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = $request->file( 'image')->store('image_siswa', 'public');

        $siswa = Auth::user()->id; 
        Siswa::create([
            'user_id' => $siswa,
            'nama' => $request['nama'],
            'nis' => $request['nis'],
            'kelas' => $request['kelas'],
            'jurusan' => $request['jurusan'],
            'alamat' => $request['alamat'],
            'image' => $imagePath
        ]);
            return redirect()->route('siswa.index');
        }


        public function edit( $id){
            $siswa = Siswa::findOrFail($id); 
            return Inertia::render('Edit', [
                'siswa' => $siswa
            ]);
        }
        

        public function update( Request $request, Siswa $siswa){
           $validate = $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswas,nis,' . $siswa->id,
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            if ($request->hasFile('image')) {
                if ($siswa->image){
                    Storage::disk('public')->delete($siswa->image);
                }
                $validate['image']= $request->file('image')->store('image_siswa', 'public');
            }

            $siswa->update($validate); 

            return redirect()->route('siswa.index');
        }

        public function destroy( Siswa $siswa){
            $siswa->delete();
            return redirect()->route('siswa.index');
        }
        
} 


