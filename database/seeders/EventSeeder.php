<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'id_user'=>'1',
            'id_pmi'=>'1',
            'title'=>'donor darah fakultas teknik',
            'institution'=>'fakultas teknik universitas udayana',
            'description'=>'donor darah ini diselengarakan dalam rangka ulang tahun fakultas teknik universitas udayana yang ke 46th',
            'img'=>'',
            'lat'=>'-8.671822644425744',
            'lng'=>'115.21946649651102',
            'address'=>'jl.Nangka',
            'target'=>'32',
            'post_at'=>'2022-01-01',
            'date_start'=>'2022-01-01',
            'date_end'=>'2022-01-01',
            'status'=>'pending'

        ]);

        Event::create([
            'id_user'=>'2',
            'id_pmi'=>'2',
            'title'=>'donor darah HUT PGRI',
            'institution'=>'PGRI bali',
            'description'=>'donor darah ini dilakukan dalam rangka ulang tahun PGRI yang ke 61',
            'img'=>'',
            'lat'=>'-8.542169',
            'lng'=>'115.329842',
            'address'=>'jl.Nangka',
            'target'=>'32',
            'post_at'=>'2022-01-01',
            'date_start'=>'2022-01-01',
            'date_end'=>'2022-01-01',
            'status'=>'pending'

        ]);

        Event::create([
            'id_user'=>'3',
            'id_pmi'=>'3',
            'title'=>'Donor Darah STT blahbatuh',
            'institution'=>'STT dharma sangka',
            'description'=>'donor darah ini diselengarakan untuk mengrayakan ulang tahun STT dharma sangka',
            'img'=>'',
            'lat'=>'-8.584517',
            'lng'=>'115.319743',
            'address'=>'jl.Nangka',
            'target'=>'32',
            'post_at'=>'2022-01-01',
            'date_start'=>'2022-01-01',
            'date_end'=>'2022-01-01',
            'status'=>'pending'

        ]);

        Event::create([
            'id_user'=>'4',
            'id_pmi'=>'4',
            'title'=>'Donor Darah smk 1 gianyar',
            'institution'=>'Osis SMKN 1 gianyar',
            'description'=>'donor darah diselengarakan dalam rangka bulan bahasa di smkn 1 gianyar',
            'img'=>'',
            'lat'=>'-8.551856188828857',
            'lng'=>'115.3264767934185',
            'address'=>'jl.Nangka',
            'target'=>'32',
            'post_at'=>'2022-01-01',
            'date_start'=>'2022-01-01',
            'date_end'=>'2022-01-01',
            'status'=>'pending'

        ]);

        Event::create([
            'id_user'=>'1',
            'id_pmi'=>'1',
            'title'=>'donor darah fakultas teknik',
            'institution'=>'fakultas teknik universitas udayana',
            'description'=>'donor darah ini diselengarakan dalam rangka ulang tahun fakultas teknik universitas udayana yang ke 46th',
            'img'=>'',
            'lat'=>'-8.57464061764619',
            'lng'=>'115.29169496656714',
            'address'=>'jl.Nangka',
            'target'=>'32',
            'post_at'=>'2022-01-01',
            'date_start'=>'2022-01-01',
            'date_end'=>'2022-01-01',
            'status'=>'pending'

        ]);
    }
}
