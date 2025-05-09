<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'price',
        'photo',
        'owner',
        'responsible',
        'access_id',
        'address_id',
        'status'
    ];
}
