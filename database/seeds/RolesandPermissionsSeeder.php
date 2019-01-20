<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesandPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'terima surat masuk']);
        Permission::create(['name' => 'tambah surat masuk']);
        Permission::create(['name' => 'edit surat masuk']);
        Permission::create(['name' => 'hapus surat masuk']);
        Permission::create(['name' => 'teruskan surat masuk']);

        Permission::create(['name' => 'terima surat keluar']);
        Permission::create(['name' => 'tambah surat keluar']);
        Permission::create(['name' => 'hapus surat keluar']);
        Permission::create(['name' => 'edit surat keluar']);
        Permission::create(['name' => 'teruskan surat keluar']);

        Permission::create(['name' => 'tambah akun']);
        Permission::create(['name' => 'edit akun']);
        Permission::create(['name' => 'hapus akun']);


        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'Kepala Bidang']);
        $role->givePermissionTo('edit articles');

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish articles', 'unpublish articles']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
