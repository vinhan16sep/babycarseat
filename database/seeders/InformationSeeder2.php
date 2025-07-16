<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Seeder;

class InformationSeeder2 extends Seeder
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
                'label' => 'working_hours',
                'value' => 'Thứ 2 - thứ 6: 7:30am - 8:00pm',
            ],
        ];

        Information::insert($data);
    }
}
