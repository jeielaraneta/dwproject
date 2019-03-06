<?php

namespace dwproject\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
	use Notifiable;

	public $table = 'enrollment';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'school_year', 'semester', 'college', 'course'
    ];
}
