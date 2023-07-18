<?php

namespace Database\Seeders;

use ApplicationStatus;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'submitted', 'created_at' => Carbon::now()],
            ['name' => 'Applied', 'created_at' => Carbon::now()],
            ['name' => 'Pending at SO', 'created_at' => Carbon::now()],
            ['name' => 'Verified by SO', 'created_at' => Carbon::now()],
            ['name' => 'Under process at Director DEPM', 'created_at' => Carbon::now()],
            ['name' => 'Verifid by Director DEPM', 'created_at' => Carbon::now()],
            ['name' => 'Not Verified by Director DEPM', 'created_at' => Carbon::now()],
            ['name' => 'Under process at addl/special secretory', 'created_at' => Carbon::now()],
            ['name' => 'Verified by addl/special secretory', 'created_at' => Carbon::now()],
            ['name' => 'Rejected by addl/special secretory', 'created_at' => Carbon::now()],
            ['name' => 'Under process at Department secretory', 'created_at' => Carbon::now()],
            ['name' => 'Approved by Department secretory', 'created_at' => Carbon::now()],
            ['name' => 'Rejected by Department secretory', 'created_at' => Carbon::now()],
            ['name' => 'Under process by Director Depm for Sanctioned process', 'created_at' => Carbon::now()],
            ['name' => 'Approved by Director Depm and Sanctioned', 'created_at' => Carbon::now()],
            ['name' => 'Rejected by Director Depm and not Sisbursed', 'created_at' => Carbon::now()],
        ];

        ApplicationStatus::insert($data);
    }
}
