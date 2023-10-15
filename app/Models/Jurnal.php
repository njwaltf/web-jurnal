<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
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
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    use HasFactory;
}