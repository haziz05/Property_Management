<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant',
    ];
}
