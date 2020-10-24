<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;
    protected $fillable = [
        'queue', 'patient_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
