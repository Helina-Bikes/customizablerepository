<?php

namespace App\Models;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'department_id',
        'orgname', 
    ];
public function department(){
    return $this->belongsTo(Department::class);
} 

public function can($abilities, $arguments = [])
    {
        return $this->role->permissions->contains('name', $abilities);
        
    }
}
