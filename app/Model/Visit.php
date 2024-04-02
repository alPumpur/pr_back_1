<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_doctor',
        'id_patient',
        'date',
        'assistant',
        'doctor',
        'doc',
        'doctor_name',
        'visit'
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'id_doctor', 'id');
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'id_patient', 'id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assistant', 'id');
    }
}