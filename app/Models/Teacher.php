<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [
        'id'
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    use HasFactory;
}