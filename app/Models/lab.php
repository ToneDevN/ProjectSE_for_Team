<?php

namespace App\Models;

use App\Models\student;
use App\Models\subjects;
use App\Models\tas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class lab extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function student(){
        return $this->belongsTo(student::class, 'student_id');
    }

    public function subject(){
        return $this->belongsTo(subjects::class, 'subject_id');
    }

    public function ta(){
        return $this->belongsTo(tas::class, 'ta_id');
    }
}
