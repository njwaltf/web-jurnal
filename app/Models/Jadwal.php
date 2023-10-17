<?php

namespace App\Models;

use App\Models\Rombel;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $guarded = [
        'id'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}