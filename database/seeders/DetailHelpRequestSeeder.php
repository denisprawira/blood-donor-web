<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailHelpRequest;

class DetailHelpRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailHelpRequest::create([
            'id_request'=>'1',
            'id_user'=>'1'
        ]);
    }
}
