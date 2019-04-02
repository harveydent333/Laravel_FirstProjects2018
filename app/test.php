<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
class test extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'id_roles','name','email','password','remember_token'];
    public function role(){
        return $this->hasOne('App\Roles','id_roles','id_roles');
    }
}
