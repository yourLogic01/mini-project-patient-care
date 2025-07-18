<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'birth_date' => 'date',
    ];

    // Relations

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

}
