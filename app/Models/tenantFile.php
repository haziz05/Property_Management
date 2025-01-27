<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tenantFile extends Model
{
    use HasFactory;
    protected $table = '_tenant_files';
}
