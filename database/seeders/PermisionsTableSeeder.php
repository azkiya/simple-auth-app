<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisionsTableSeeder extends Seeder
{
    private $permissions = [
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'user-list',
        'user-create',
        'user-edit',
        'user-delete',
        'reimbursement-approval',
        'payment-list',
    ];

    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        //assign direktur as admin
        $admin = User::find(1);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);
        
        //assign role finance
        $finance = User::find(2);
        $financeRole = Role::create(['name' => 'Finance']);
        $financeRole->givePermissionTo([ 'reimbursement-approval','payment-list']);
        $finance->assignRole('Finance');
    }
}
