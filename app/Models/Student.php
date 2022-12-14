<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Doc;
use App\Models\College;
use App\Models\Dept;

class Student extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function doc()
    {
        return $this->belongsTo(Doc::class);
    }
    public function college()
    {
        return $this->belongsTo(College::class);
    }
    public function dept()
    {
        return $this->belongsTo(Dept::class);
    }


    
}
