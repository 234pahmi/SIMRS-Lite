<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    public $table = "patients";

    protected $fillable = [
        'polyclinic_id', 'name', 'address', 'phone_number', 'category_patient','date','no_queue','is_diagnose','is_active','address'
    ];

    public function polyclinic()
    {
        return $this->belongsTo(Polyclinic::class);
    }

    public function queue()
    {
        return $this->hasOne(Queue::class);
    }
}
