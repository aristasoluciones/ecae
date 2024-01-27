<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\DB;

class IniciarPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();

        $roles =  ['superadministrador','administrador','odes','consejero'];

        $permisos = [
            'configuraciones' => [
                'usuarios',
                'usuarios.agregar',
                'usuarios.editar',
                'usuarios.eliminar',
                'roles',
                'roles.agregar',
                'roles.editar',
                'roles.eliminar',
            ],
            'aspirantes' => [
                'editar',
                'eliminar',
                'validar',
            ],
            'reportes' => [
                'graficas',
                'reportes',
            ]
        ];

        foreach ($permisos as $key => $permiso) {
            Permission::create(['name' => $key]);
            foreach ($permiso as $perm) {
                Permission::create(['name' => $key.".".$perm]);
            }
        }

        foreach ($roles as $role) {
            $role = Role::create(['name' => $role]);
            if($role) {
                $role->syncPermissions(Permission::all());
            }
        }

        $user =  User::where('email', 'demo')->first();
        if($user)
            $user->syncRoles(['superadministrador']);
    }
}
