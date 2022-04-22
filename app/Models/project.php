<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\project;
use App\Models\TimeEntry;
use App\Models\task;

class project extends Model
{
    use HasFactory;
    public function tasks()
    {
        return $this->hasMany(task::class,'project_id', 'id');
    }
    public function project(){
        return $this->hasMany(TimeEntry::class, 'project_id','id');
    }
}
