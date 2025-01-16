<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as SpatieRole;


class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
  
    protected $fillable=[
        'name',
        'roledesc',
    ];
    public function users(){
        return $this->hasMany(User::class,'role_id', 'id');
    }
    public function permissions(){
      return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }
    
    
}
