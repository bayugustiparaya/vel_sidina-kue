<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\Jabatan;
use App\Models\Penduduk\PendudukAkun;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $dev_role = Jabatan::create(['name' => 'Developer', 'guard_name' => 'admin']);
        $dev_permissions = Permission::pluck('id', 'id')->all();
        $dev_role->syncPermissions($dev_permissions);
        $dev = User::create([
            'name' => 'IT Suport',
            'email' => 'superman@gmail.com',
            'is_active' => true,
            'is_verified' => true,
            'jabatan_id' => $dev_role->id,
            'password' => bcrypt('asdasd123')
        ]);
        $dev->assignRole([$dev_role->id]);
    }
}
