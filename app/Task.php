<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
      'title','project_id','completed'
    ];
    public function project()
    {
      return $this->belongsTo('App\Project', 'project_id', 'id');
    }

    public function getProjectListAttribute()
    {
      return $this->project->id;
    }
}
