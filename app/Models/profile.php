<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'image',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
