<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Work_controller;
use Database\Factories\WorkerFactory;

class Worker extends Model
{
    use HasFactory;
    protected $table = 'workers';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $with = ['paymentType', 'roleType', 'fileName'];
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'payment_type',
        'role_type',
        'filename_type',
    ];

    public function paymentType()
    {
        return $this->belongsTo(Payment::class, 'payment_type', 'type');
    }
    
    public function roleType()
    {
        return $this->belongsTo(Role::class, 'role_type', 'type');
    }

    public function fileName()
    {
        return $this->belongsTo(Achievement::class, 'filename_type', 'filename');
    }
}
