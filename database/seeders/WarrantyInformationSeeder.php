<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Seeder;

class WarrantyInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=WarrantyInformationSeeder
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'type' => 'WARRANTY',
                'label' => 'email',
                'value' => 'support@babyro.uk',
            ],
            [
                'type' => 'WARRANTY',
                'label' => 'phone',
                'value' => '0967 8888 68',
            ],
            [
                'type' => 'WARRANTY',
                'label' => 'working_hours',
                'value' => 'Thứ 2 - thứ 6: 7:30am - 8:00pm',
            ],
        ];

        Information::insert($data);
    }
}
