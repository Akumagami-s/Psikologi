<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePatient extends Model
{

    protected $fillable = ['user_id','address','fullname','age','phone','status','thumb'];
    use HasFactory;
}
