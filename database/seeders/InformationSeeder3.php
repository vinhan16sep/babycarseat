<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Seeder;

class InformationSeeder3 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'type' => 'CONTACT',
                'label' => 'address_nt',
                'value' => 'Số 2 đường DEF, Quận 1, TP Hồ Chí Minh',
            ],
        ];

        Information::insert($data);
    }
}
