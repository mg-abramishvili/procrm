<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'index_table_budget_column', 'user_id'
    ];
}
