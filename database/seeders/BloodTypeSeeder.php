<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BloodType;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BloodType::create([
            'blood_type'=>'AB+'
        ]);

        BloodType::create([
            'blood_type'=>'AB-'
        ]);

        BloodType::create([
            'blood_type'=>'A+'
        ]);

        BloodType::create([
            'blood_type'=>'A-'
        ]);

        BloodType::create([
            'blood_type'=>'B+'
        ]);

        BloodType::create([
            'blood_type'=>'B-'
        ]);

        BloodType::create([
            'blood_type'=>'O+'
        ]);

        BloodType::create([
            'blood_type'=>'O-'
        ]);

        BloodType::create([
            'blood_type'=>'None'
        ]);
    }
}
