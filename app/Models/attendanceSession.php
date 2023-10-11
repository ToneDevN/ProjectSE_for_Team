<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class attendanceSession extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function subject(){
        return $this->belongsTo(subjects::class, 'subject_id');
    }

}
