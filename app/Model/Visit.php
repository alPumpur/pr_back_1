<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_doctor',
        'id_patient',
        'date',
        'status',
        'assistant',
    ];
}