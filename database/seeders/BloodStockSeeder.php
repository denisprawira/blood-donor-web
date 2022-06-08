<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BloodStock;

class BloodStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BloodStock::create([
            'id_component'=>'1',
            'blood_type'=>'1',
            'id_pmi'=>'1',
            'total'=>'3'
        ]);
    }
}
