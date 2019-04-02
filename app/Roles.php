<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
      protected $table = 'role';
      const ROLE_ADMIN = 1;
      protected $fillable = [
          'id_roles', 'role'];

      public function role(){
      return $this->belongsTo('App\test');
      }
}
