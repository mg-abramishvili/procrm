<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'budget', 'client', 'status'
    ];

    public function finances()
    {
        return $this->belongsToMany('App\Models\Finance');
    }

    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task');
    }

    public function documents()
    {
        return $this->belongsToMany('App\Models\Document');
    }
}
