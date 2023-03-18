<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;
    protected $fillable =[
        'Name',
        'code',
    ];

    public function courts(){
        return $this->hasMany(court::class);

    }
}
