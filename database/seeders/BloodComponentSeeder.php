<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BloodComponent;

class BloodComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BloodComponent::create([
            'name'=>'Whole Blood',
            'description'=>'this is description for whole blood'
        ]);
    }
}
