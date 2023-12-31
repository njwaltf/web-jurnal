<?php

namespace App\Models;

use App\Models\Rombel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }
    public function tahun()
    {
        return $this->belongsTo(TahunAjaran::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}