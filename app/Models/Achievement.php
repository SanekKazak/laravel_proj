<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $primaryKey = 'filename';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'achievements';
    public $timestamps = false;
    protected $fillable = [
        'filename',
        'path'
    ];
}
