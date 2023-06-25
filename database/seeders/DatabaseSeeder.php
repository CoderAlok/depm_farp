<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $permissions = [
            'user-module',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'role-module',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'master-module',
            'master-list',
            'master-create',
            'master-edit',
            'master-delete',
        ];

        foreach ($permissions as $permission) {
            $model = Permission::whereName($permission);
            if ($model->count() == 0) {
                Permission::create(['name' => $permission]);
            }

        }
    }
}
