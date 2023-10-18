<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [
        'id'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    use HasFactory;
}