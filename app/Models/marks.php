<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marks extends Model
{
    use HasFactory;

    public function studentlist()
    {
        return $this->belongsTo(Student::class, 'studentId', 'id');
    }

    public function terms()
    {
        return $this->belongsTo(Terms::class, 'termId', 'id');
    }
}
