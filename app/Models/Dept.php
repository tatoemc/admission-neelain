<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\College;
use App\Models\Student;

class Dept extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];


    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }




}
