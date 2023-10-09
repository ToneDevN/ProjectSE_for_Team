<?php

namespace App\Models;

use App\Models\lecture;
use App\Models\subject_has_students;
use App\Models\tas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'student_id';

    public function user(){
        return $this->belongsTo(User::class, 'student_id');
    }

    public function tas(){
        return $this->hasMany(tas::class);
    }

    public function subject_has_students(){
        return $this->hasMany(subject_has_students::class, 'student_id');
    }

    public function lectures(){
        return $this->hasMany(lecture::class);
    }

    public function labs(){
        return $this->hasMany(lab::class);
    }

}
