<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'polyclinic_id', 'role', 'name','email','nik'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function polyclynic()
    {
        return $this->belongsTo(Polyclinic::class);
    }
}
