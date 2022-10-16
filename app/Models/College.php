<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Dept;
use App\Models\User;



class College extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function depts()
    {
        return $this->hasMany(Dept::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }

    
}
