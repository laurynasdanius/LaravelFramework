<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tasks extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_name', 'task_details','task_priority'
    ];
    use SoftDeletes;
}
