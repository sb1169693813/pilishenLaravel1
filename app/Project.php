<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'thumbnail', 'user_id'
  ];
    public function user()
    {
      return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function tasks()
    {
      return $this->hasMany('App\Task', 'project_id', 'id');
    }

}
