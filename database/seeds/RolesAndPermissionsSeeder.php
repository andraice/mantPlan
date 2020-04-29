<?php
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'create']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        // or may be done by chaining
        $role = Role::create(['name' => 'company']);
        $role->givePermissionTo(['create']);

        $role = Role::create(['name' => 'operator']);
        $role->givePermissionTo('edit');

        $role = Role::create(['name' => 'technical']);
        $role->givePermissionTo('edit');


        $user = User::find(1);
        $user->assignRole('admin');

        $user = User::find(2);
        $user->assignRole('company');

        $user = User::find(3);
        $user->assignRole('technical');

        $user = User::find(4);
        $user->assignRole('technical');

        $user = User::find(5);
        $user->assignRole('operator');

    }
}
