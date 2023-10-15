<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'izin',
        'hadir',
        'alpha',
        'sakit',
        'date',
        'rombel_id'
    ];

    public function absen_detail()
    {
        return $this->belongsTo(AbsenDetail::class);
    }
    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }
    use HasFactory;
}