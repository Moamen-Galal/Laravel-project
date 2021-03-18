<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class student extends Authenticatable
{
    use HasFactory;

    protected  $table   = "students";

    protected  $fillable = ["name","email","password"];

    protected  $hidden   = ["updated_at","password","remember_token","created_at"];



    // protected $hidden = ["name"];      



}
