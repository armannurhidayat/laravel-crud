<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    
    protected $fillable = ['nama', 'kelas_id', 'alamat'];

    public function kelas() {
        return $this->belongsTo('App\Models\Kelas');

        // belongTo = Relasi One to many
    }
}
