<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'photo',
        'owner',
        'responsible',
        'address_id',
        'province_id',
        'municipality_id',
        'address_id',
        'status'
    ];

    public function getOwner(){
        return $this->belongsTo(User::class, "owner", "id");
    }
    public function getResponsible(){
        return $this->belongsTo(User::class, "responsible", "id");
    }
    public function getProvince(){
        return $this->belongsTo(Province::class, "province_id", "id");
    }
    public function getMunicipality(){
        return $this->belongsTo(Municipality::class, "municipality_id", "id");
    }
    public function getAddress(){
        return $this->belongsTo(Address::class, "address_id", "id");
    }
}
