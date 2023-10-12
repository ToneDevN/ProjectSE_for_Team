<?php

namespace App\Models;

use App\Models\student;
use App\Models\subjects;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class lecture extends Model
{
    use HasFactory;
    use SoftDeletes;



    public function student(){
        return $this->belongsTo(student::class, 'student_id');
    }

    public function subject(){
        return $this->belongsTo(subjects::class, 'subject_id');
    }
    public function attendance(){
        return $this->belongsTo(attendanceSession::class, 'attendanceSession_id ');
    }


}
