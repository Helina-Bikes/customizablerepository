<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder{
public function run()
{
    // Create roles with description
   
    $superAdmin = Role::create(['name' => 'Super Admin', 'roledesc' => 'Has access to all roles and permissions']);
    $admin = Role::create(['name' => 'Admin', 'roledesc' => 'Manages all product, category, and sales data']);
    $productManager = Role::create(['name' => 'Product Manager', 'roledesc' => 'Manages products and categories']);
    // Create permissions with description
    $permissions = [
        ['name' => 'View Product', 'description' => 'Role to view product in the inventory'],
        ['name' => 'Edit Product', 'description' => 'Role to update product in the inventory'],
        ['name' => 'Delete Product', 'description' => 'Role to delete product in the inventory'],
        ['name' => 'Add Products', 'description' => 'Role to add product to the inventory'],
        ['name' => 'Add Category', 'description' => 'Role to add category for the product'],
        ['name' => 'Edit Category', 'description' => 'Role to edit category for the product'],
        ['name' => 'View Category', 'description' => 'Role to view category for the product'],
        ['name' => 'Delete Category', 'description' => 'Role to delete category for the product'],
        ['name' => 'Add Users', 'description' => 'Role to add users for the organization'],
        ['name' => 'Edit Users', 'description' => 'Role to edit users for the organization'],
        ['name' => 'View Users', 'description' => 'Role to view users for the organization'],
        ['name' => 'Delete Users', 'description' => 'Role to delete users for the product'],
        ['name' => 'Add Roles', 'description' => 'Role to add roles'],
        ['name' => 'Edit Roles', 'description' => 'Role to edit roles'],
        ['name' => 'Delete Roles', 'description' => 'Role to delete roles'],
        ['name' => 'Add Permission', 'description' => 'Role to add permissions for the organization'],
        ['name' => 'Edit Permission', 'description' => 'Role to edit permissions for the organization'],
        ['name' => 'Delete Permission', 'description' => 'Role to delete permission'],
        ['name' => 'View Customer Lists', 'description' => 'Role to view customer lists'],
        ['name' => 'View Supplier Lists', 'description' => 'Role to view supplier lists'],
        ['name' => 'View Purchase List', 'description' => 'Role to view purchase lists'],
        ['name' => 'Add Purchase', 'description' => 'Role to add purchase records'],
        ['name' => 'View Sales Lists', 'description' => 'Role to view sales lists'],
    ];

    // Create permissions in the database
    foreach ($permissions as $permission) {
        Permission::create(['name' => $permission['name'], 'description' => $permission['description']]);
    }

    // Assign all permissions to Super Admin
}
}
