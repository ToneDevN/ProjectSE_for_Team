<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'ta_id';
    
    public function student(){
        return  $this->belongsTo(student::class, 'ta_id');
    }


    public function labs(){
        return $this->hasMany(lab::class);
    }
}
