<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

        protected $fillable = [
            'user_id',
            'nama',
            'nis',
            'kelas',
            'jurusan',
            'alamat',
            'image'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
