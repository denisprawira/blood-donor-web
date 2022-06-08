<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'       => 'Denis Prawira',
            'email'      => 'denis.prawira@gmail.com',
            'password'   => bcrypt('denisprawira'),
            'phone'      => '087761612201',
            'address'    => 'perum blahbatuh indah block b no 10',
            'blood_type' => '1',
            'role'       => 'user',
            'status'     => 'verified'
        ]);

        User::create([
            'name'       => 'Surya Wijaya',
            'email'      => 'surya.wijaya@gmail.com',
            'password'   => bcrypt('suryawijaya'),
            'phone'      => '087345437483',
            'address'    => 'jl. angsara kemari',
            'blood_type' => '2',
            'role'       => 'user',
            'status'     => 'verified'
        ]);

        User::create([
            'name'       => 'Komang Yudha',
            'email'      => 'komang.yudha@gmail.com',
            'password'   => bcrypt('komangyudha'),
            'phone'      => '081837934043',
            'address'    => 'perum indah wangi',
            'blood_type' => '3',
            'role'       => 'user',
            'status'     => 'verified'
        ]);

        User::create([
            'name'       => 'Ketut Yasin',
            'email'      => 'ketut.yasin@gmail.com',
            'password'   => bcrypt('ketutyasin'),
            'phone'      => '082949302834',
            'address'    => 'jl. sudirman sari',
            'blood_type' => '4',
            'role'       => 'user',
            'status'     => 'verified'
        ]);

        User::create([
            'name'       => 'andre tandinata',
            'email'      => 'andre.tandinata@gmail.com',
            'password'   => bcrypt('andretandinata'),
            'phone'      => '087763632234',
            'address'    => 'jl. sudirman said',
            'blood_type' => '6',
            'role'       => 'pmi',
            'status'     => 'verified'
        ]);

        User::create([
            'name'       => 'komang ariani',
            'email'      => 'komang.ariani@gmail.com',
            'password'   => bcrypt('komangariani'),
            'phone'      => '087223432112',
            'address'    => 'jl. tekulak kaja',
            'blood_type' => '5',
            'role'       => 'pmi',
            'status'     => 'verified'
        ]);
    }
}
