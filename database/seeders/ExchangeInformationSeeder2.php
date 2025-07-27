<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Seeder;

class ExchangeInformationSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ExchangeInformationSeeder2
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'type' => 'EXCHANGE',
                'label' => 'evidence_email',
                'value' => 'info@babyro.com.vn',
            ],
        ];

        Information::insert($data);
    }
}
