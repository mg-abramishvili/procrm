<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'amount', 'date', 'fin_type'
    ];

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }
}
