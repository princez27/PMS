<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
