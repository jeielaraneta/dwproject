<?php

namespace dwproject\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    public $table = 'employee';

    protected $fillable = [
        'involvement', 'category', 'department', 'academic_rank'
    ];
}
