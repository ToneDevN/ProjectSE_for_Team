<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class subject_has_students extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false;
    
    protected $primaryKey = ['student_id', 'subject_id'];

    protected $fillable = ['student_id', 'subject_id'];

    public function student(){
        return $this->belongsTo(student::class, 'student_id');
    }

    public function subject(){
        return $this->belongsTo(subjects::class, 'subject_id');
    }

    public function attendanceSession(){
        return $this->hasMany(attendanceSession::class, 'subject_id');
    }
    
    public function labSession(){
        return $this->hasMany(labSession::class, 'subject_id');
    }
}
