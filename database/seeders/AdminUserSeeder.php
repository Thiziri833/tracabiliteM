<?php

namespace Database\Seeders;

use App\Models\Structure;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminadmin'),
            'structure_id'=> 1,
            'is_super_admin' => true,

        ]);
        // Création du rôle Admin et attribution des permissions
        $roleAdmin = Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        $permissionsAdmin = Permission::whereIn('name', ['role-list','role-create','role-edit','role-delete','user-list','user-create','user-edit','user-delete','structure-list','structure-create','structure-edit','structure-delete','line-list','line-create','line-edit','line-delete','product-list','product-create','product-edit','product-delete','order-list','order-create','order-edit','order-delete','customer-list','customer-create','customer-edit','customer-delete'])->pluck('id', 'id')->all();
        $roleAdmin->syncPermissions($permissionsAdmin);
        $user->assignRole([$roleAdmin->id]);

       // Création du rôle User-Prod et attribution des permissions
       $roleUserProd = Role::create(['name' => 'User-Prod', 'guard_name' => 'web']);
       $permissionsUserProd = Permission::whereIn('name', ['production-list','production-create','production-edit','production-delete','printing-list','printing-create','printing-edit','printing-delete','pallet-list','pallet-create','pallet-edit','pallet-delete'])->pluck('id', 'id')->all();
       $roleUserProd->syncPermissions($permissionsUserProd);
       $user->assignRole([$roleUserProd->id]);

        // Création du rôle User-Exped et attribution des permissions
        $roleUserExped = Role::create(['name' => 'User-Exped', 'guard_name' => 'web']);
        $permissionsUserExped = Permission::whereIn('name', ['order-list','order-create','order-edit','order-delete','load-list','load-create','load-edit','load-delete'])->pluck('id', 'id')->all();
        $roleUserExped->syncPermissions($permissionsUserExped);
        $user->assignRole([$roleUserExped->id]);

        // Création du rôle Admin-Prod et attribution des permissions
       $roleAdminProd = Role::create(['name' => 'Admin-Prod', 'guard_name' => 'web']);
       $permissionsAdminProd = Permission::whereIn('name', ['line-list','line-create','line-edit','product-list','product-create','product-edit','production-list','production-create','production-edit','production-delete','printing-list','printing-create','printing-edit','printing-delete','pallet-list','pallet-create','pallet-edit','pallet-delete'])->pluck('id', 'id')->all();
       $roleAdminProd->syncPermissions($permissionsAdminProd);
       $user->assignRole([$roleAdminProd->id]);

        // Création du rôle Admin-Exped et attribution des permissions
        $roleAdminExped = Role::create(['name' => 'Admin-Exped', 'guard_name' => 'web']);
        $permissionsAdminExped = Permission::whereIn('name', ['order-list','order-create','order-edit','order-delete','customer-list','customer-create','customer-edit','customer-delete','load-list','load-create','load-edit','load-delete'])->pluck('id', 'id')->all();
        $roleAdminExped->syncPermissions($permissionsAdminExped);
        $user->assignRole([$roleAdminExped->id]);
    }
}
