<?php

use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Lokasi::insert([
            [
                'lokasi'  => 'Kota Madiun',
                'longitude' => '111.513702',
                'latitude' => '-7.629714'
            ],
            [
                'lokasi'  => 'Kabupaten Madiun',
                'longitude' => '111.505483',
                'latitude' => '-7.627753'
            ],
            [
                'lokasi'  => 'Rumah VIKA',
                'longitude' => '111.535997',
                'latitude' => '-7.617510'
            ],
            [
                'lokasi'  => 'Kampus 1 Politeknik Negeri madiun',
                'longitude' => '111.526756',
                'latitude' => '-7.647394'
            ],
            [
                'lokasi'  => 'Kampus 2 Politeknik Negeri madiun',
                'longitude' => '111.510618',
                'latitude' => '-7.611962'
            ]
        ]);
    }
}
