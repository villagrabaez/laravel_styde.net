<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $fillable = [
      'title'
    ];

    public function users()
    {
      // Una profession tiene muchos usuarios
      return $this->hasMany(User::class);
    }
}
