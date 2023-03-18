<?php

namespace App\Models;

use App\Models\circle;
use App\Models\country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class court extends Model
{
    use HasFactory;
    protected $fillable =[
        'company_id',
        'court_name',
        'country_id',
    ];

    public function circles(){
        return $this->hasMany(circle::class);
    }

    public function country(){
        return $this->belongsTo(country::class);
    }
}
