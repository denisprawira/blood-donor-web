<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DonorHistory;

class DonorHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonorHistory::create([
            'id_user'          => '1',
            'id_pmi'           => '1',
            'blood_pressure'   => '1',
            'body_temperature' => '1',
            'pulse'            => '343',
            'hemoglobin'       => '4343',
            'description'      => 'this is fatal desease',
            'date'             => '2022-01-01',
            'location'         => 'br.blahbatuh saba',
            'history_type'     => 'regular'
        ]);
    }
}
