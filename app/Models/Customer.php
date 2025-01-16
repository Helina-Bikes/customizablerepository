<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
   use HasFactory;
   protected $table=customers;
   protected $fillable=[
       'name',
       'email',
       'phone',
       'address',
       'department_id', 
   ];
   public function  department(){
        return $this->belongsTo(Department::class);
   }



}
