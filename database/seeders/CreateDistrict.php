<?php

namespace Database\Seeders;

use Carbon\Carbon;
use District;
use Illuminate\Database\Seeder;

class CreateDistrict extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //source : https://github.com/sab99r/Indian-States-And-Districts/blob/master/states-and-districts.json

        $insert_data = [
            ['state_id' => 25, 'name' => "Angul", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Balangir", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Balasore", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Bargarh", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Bhadrak", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Boudh", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Cuttack", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Deogarh", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Dhenkanal", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Gajapati", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Ganjam", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Jagatsinghapur", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Jajpur", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Jharsuguda", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Kalahandi", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Kandhamal", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Kendrapara", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Kendujhar (Keonjhar)", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Khordha", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Koraput", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Malkangiri", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Mayurbhanj", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Nabarangpur", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Nayagarh", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Nuapada", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Puri", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Rayagada", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Sambalpur", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Sonepur", 'created_by' => 1, 'created_at' => Carbon::now()],
            ['state_id' => 25, 'name' => "Sundargarh", 'created_by' => 1, 'created_at' => Carbon::now()],
        ];

        District::insert($insert_data);
    }
}
