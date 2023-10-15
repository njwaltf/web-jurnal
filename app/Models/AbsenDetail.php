<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenDetail extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'student_id',
        'attendance',
        'rombel_id',
        'date_detail',
        'detail'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }
    public function scopeWhereArray($query, $array)
    {
        foreach ($array as $field => $value) {
            $query->where($field, $value);
        }
        return $query;
    }
    use HasFactory;
}