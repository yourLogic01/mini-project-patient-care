<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'visit_date' => 'date',
    ];


    // Relations
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
