<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailEvent;

class DetailEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailEvent::create([
            'id_event'=>'1',
            'id_user'=>'1'
        ]);
    }
}
