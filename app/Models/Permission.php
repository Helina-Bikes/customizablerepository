<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];

    // Many-to-Many Relationship with Roles
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }
}
