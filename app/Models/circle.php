<?php

namespace App\Models;

use App\Models\court;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class circle extends Model
{
    use HasFactory;
    protected $fillable =[
        'circle_name',
        'court_id',
        'company_id',
       ];

       public function court(){
        return $this->belongsTo(court::class);
        
    }
    
}





