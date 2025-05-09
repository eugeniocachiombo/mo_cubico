<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipalitiy extends Model
{
    use HasFactory;

    protected $fillable = [
        "description",
        "province_id"
    ];
}
