<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pmi;

class PmiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pmi::create([//cordinate done, address done, phone done
            'name'=>'UTD Provinsi Bali',
            'address'=>'JL. Kesehatan No.80114, Dauh Puri Klod, Denpasar Barat, Denpasar City, Bali 80114',
            'lat'=>'-8.675265015492329',
            'lng'=>'115.21208343130847'
        ]);

        Pmi::create([//cordinate done, address done, phone done
            'name'=>'UTD Kabupaten Bangli',
            'address'=>'Jl. Ngurah Rai, 80613, Kawan, Kec. Bangli, Kabupaten Bangli, Bali 80614',
            'lat'=>'-8.456936677187334',
            'lng'=>'115.35259855465144',
        ]);

        Pmi::create([//cordinate done, address done, phone done
            'name'=>'UTD Kabupaten Karangasem',
            'address'=>'Jl. Ngurah Rai No.55, Karangasem, Kec. Karangasem, Kabupaten Karangasem, Bali 80811',
            'lat'=>'-8.43592999362226',
            'lng'=>'115.61203504974135'
        ]);

    

        Pmi::create([//cordinate done, address done, phone done 
            'name'=>'UTD Kabupaten Klungkung',
            'address'=>'l. Flamboyan No.36, Semarapura Kauh, Kec. Klungkung, Kabupaten Klungkung, Bali 80716',
            'lat'=>'-8.538421120372462',
            'lng'=>'115.39495603948248'
        ]);
        
        //BADUNG
        Pmi::create([//cordinate done, address done, phone done 
            'name'=>'UTD Kabupaten Badung',
            'address'=>'Kapal, Mengwi, Badung Regency, Bali 80351',
            'lat'=>'-8.578798973980515', 
            'lng'=>'115.18259991065823',
        ]);

        //TABANAN
        Pmi::create([//cordinate done, address done, phone done 
            'name'=>'UTD Kabupaten tabanan',
            'address'=>' Jl. Pahlawan No.14, Delod Peken, Kec. Tabanan, Kabupaten Tabanan, Bali 82121',
            'lat'=>'-8.537727471847028',
            'lng'=>'115.1320423105936',
        ]);

        //BULELENG
        Pmi::create([//cordintate done, address done, phone done 
            'name'=>'UTD PMI Cabang Buleleng',
            'address'=>'Jl. Yudistira No.3, Astina, Kec. Buleleng, Kabupaten Buleleng, Bali',
            'lat'=>'-8.11950180050283', 
            'lng'=>'115.09256295726267'
        ]);

        //GIANYAR
        Pmi::create([//cordinate done, address done, phone done  
            'name'=>'UTD PMI Kabupaten Gianyar',
            'address'=>'Jl. Kebo Iwa No.2C, Gianyar, Kec. Gianyar, Kabupaten Gianyar, Bali 80511',
            'lat'=>'-8.543378014207196',
            'lng'=>'115.32262292523836'
        ]);

        //JEMBRANA
        Pmi::create([//cordinate done, address done, phone done  
            'name'=>'UTD PMI Kabupaten Jembrana',
            'address'=>'Baler Bale Agung, Negara, Jembrana Regency, Bali',
            'lat'=>'-8.354863201982061',
            'lng'=>'114.62098340712177',
        ]);

    }
}
