<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use App\Models\BloodType;
// use App\Models\DonorHistory;
// use App\Models\Event;
// use App\Models\HelpRequest;
// use App\Models\Pmi;
// use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PmiSeeder::class,
            BloodTypeSeeder::class,
            UserSeeder::class,
            EventSeeder::class,
            HelpRequestSeeder::class,
            DetailEventSeeder::class,
            DetailHelpRequestSeeder::class,
            DonorHistorySeeder::class,
            BloodComponentSeeder::class,
            BloodStockSeeder::class
        ]);
    }
}
