<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{

    use HasFactory;
    protected $table = 'department'; 
    protected $fillable = [
        'departmentname', 
        'departmentdesc'
    
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
