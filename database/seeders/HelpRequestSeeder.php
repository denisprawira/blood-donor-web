<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HelpRequest;

class HelpRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HelpRequest::create([
            'id_user'=>'1',
            'id_pmi'=>'1',
            'blood_type'=>'1',
            'description'=>'sangat membutuhkan darah segera untuk oprasi hati',
            'patient_name'=>'I Ketut Marti',
            'target'=>'3',
            'post_at'=>'2021-01-01',
            'status'=>'pending'
        ]);

        HelpRequest::create([
            'id_user'=>'2',
            'id_pmi'=>'2',
            'blood_type'=>'2',
            'description'=>'segera membutuhkan darah karna anemia',
            'patient_name'=>'I Nyoman Suteja',
            'target'=>'4',
            'post_at'=>'2021-01-01',
            'status'=>'pending'
        ]);

        HelpRequest::create([
            'id_user'=>'3',
            'id_pmi'=>'3',
            'blood_type'=>'3',
            'description'=>'perlu donor darah cepat untuk kebutuhan operasi',
            'patient_name'=>'I Ketut Murni',
            'target'=>'6',
            'post_at'=>'2021-01-01',
            'status'=>'pending'
        ]);

        HelpRequest::create([
            'id_user'=>'4',
            'id_pmi'=>'4',
            'blood_type'=>'4',
            'description'=>'dibutuhkan darah untuk operasi tumor otak',
            'patient_name'=>'Agus Arina',
            'target'=>'2',
            'post_at'=>'2021-01-01',
            'status'=>'pending'
        ]);
    }
}
