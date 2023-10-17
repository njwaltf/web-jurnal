<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $guarded = [
        'id'
    ];
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }
    use HasFactory;
}