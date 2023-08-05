<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Hash;
use Illuminate\Database\Seeder;
use User;

class CreateUsers extends Seeder
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
                'role_id'        => '1',
                'type'           => '2',
                'first_name'     => 'Super',
                'last_name'      => 'Admin',
                'email'          => 'superadmin@mail.com',
                'username'       => 'superadmin',
                'password'       => Hash::make('12345678'),
                'phone'          => '0000000000',
                'confirmed'      => 0,
                'remember_token' => '',
                'created_at'     => Carbon::now(),
            ],
            [
                'role_id'        => '2',
                'type'           => '2',
                'first_name'     => 'Pradeep Kumar',
                'last_name'      => 'Mohanty',
                'email'          => 'prabhashbhattacharya1991@gmail.com',
                'username'       => 'sodepm',
                'password'       => Hash::make('12345678'),
                'phone'          => '9668271360',
                'confirmed'      => 0,
                'remember_token' => '',
                'created_at'     => Carbon::now(),
            ],
            [
                'role_id'        => '3',
                'type'           => '2',
                'first_name'     => 'Dilip Kumar',
                'last_name'      => 'Sahoo',
                'email'          => 'dipeshmishro1887@gmail.com',
                'username'       => 'dirdepm',
                'password'       => Hash::make('12345678'),
                'phone'          => '9438757486',
                'confirmed'      => 0,
                'remember_token' => '',
                'created_at'     => Carbon::now(),
            ],
            [
                'role_id'        => '4',
                'type'           => '2',
                'first_name'     => 'Additional',
                'last_name'      => 'Secretary',
                'email'          => 'pradeepmohanty91@gmail.com',
                'username'       => 'addlsecy',
                'password'       => Hash::make('12345678'),
                'phone'          => '9999999999',
                'confirmed'      => 0,
                'remember_token' => '',
                'created_at'     => Carbon::now(),
            ],
            [
                'role_id'        => '5',
                'type'           => '2',
                'first_name'     => 'Saswat',
                'last_name'      => 'Mishra',
                'email'          => 'parijatmishro98@gmail.com',
                'username'       => 'secymsme',
                'password'       => Hash::make('12345678'),
                'phone'          => '9999999999',
                'confirmed'      => 0,
                'remember_token' => '',
                'created_at'     => Carbon::now(),
            ],
            [
                'role_id'        => '7',
                'type'           => '2',
                'first_name'     => 'Abhinash',
                'last_name'      => 'Mohanty',
                'email'          => 'abhinashmohanty998@gmail.com',
                'username'       => 'ddodepm',
                'password'       => Hash::make('12345678'),
                'phone'          => '9999999999',
                'confirmed'      => 0,
                'remember_token' => '',
                'created_at'     => Carbon::now(),
            ],
        ];
        User::insert($insert_data);
    }
}
