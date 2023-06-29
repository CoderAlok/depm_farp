<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CreateRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert_data = [
            [
                'name'  => 'Super Admin',
                'guard_name' => 'web',
            ],
            [
                'name'  => 'Publicity Officer',
                'guard_name' => 'web',
            ],
            [
                'name'  => 'Director of DEPM',
                'guard_name' => 'web',
            ],
            [
                'name'  => 'MSME Department',
                'guard_name' => 'web',
            ],
            [
                'name'  => 'Principal Secretary',
                'guard_name' => 'web',
            ],
            [
                'name'  => 'Accounts Officer',
                'guard_name' => 'web',
            ],
            [
                'name'  => 'Exporters Merchant',
                'guard_name' => 'exporter',
            ],
            [
                'name'  => 'Exporters Manufacturer',
                'guard_name' => 'exporter',
            ],
        ];
        Role::insert($insert_data);
    }
}
