<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class posts extends model
{
    use HasFactory;

    protected  $table   = "posts";

    protected  $fillable = ["title","user_id"];




    // protected $hidden = ["name"];      

    public function userdata(){
        return  $this->belongsTo('App\Models\User','user_id','id');
      }  

}
