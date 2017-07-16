<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects()
    {
      return $this->hasMany('App\Project', 'user_id', 'id');
    }

    // 方法的第一个参数为我们希望最终访问的模型名称，而第二个参数为中间模型的名称
    //第三个参数为中间模型的外键名称，而第四个参数为最终模型的外键名称。
    public function tasks()
    {
      return $this->hasManyThrough('App\Task', 'App\Project', 'user_id', 'project_id');
    }
}
