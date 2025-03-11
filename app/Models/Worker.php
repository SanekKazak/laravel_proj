<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Work_controller;

class Worker extends Model
{
    protected $table = 'workers';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'payment_type',
        'role_type',
    ];
}
