<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class subjects extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'subject_id';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subject_has_students(){
        return $this->hasMany(subject_has_students::class);
    }


    public function lectures(){
        return $this->hasMany(lecture::class);
    }

    public function labs() {
        return $this->hasMany(lab::class);
    }
}
