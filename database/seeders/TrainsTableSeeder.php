<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $companies = ['Italo', 'Trenitalia', 'SNCF', 'Ferrovie del Sud Est', 'Thello', 'Trenord', 'Ferrovie Appulo Lucane'];
        $departureCity = ['Milano','Torino','Bari','Roma','Napoli','Foggia','Taranto','Venezia','Bologna'];
        $arrivalCity = ['Bari','Reggio Calabria','Lecce','Brindisi','Andria','Varese','Napoli','Firenze','Foggia'];

        for ($i=0; $i < 30; $i++) {
            $new_trian = new Train();
            $new_trian->agency = $faker->randomElement($companies);
            $new_trian->departure_station = $faker->randomElement($departureCity);
            $new_trian->arrival_station = $faker->randomElement($arrivalCity);
            $new_trian->departure_time = $faker->date() . ' ' . $faker->time();
            $new_trian->arrival_time = $faker->date() . ' ' . $faker->time();
            $new_trian->train_code = $faker->numberBetween(1000, 99999);
            $new_trian->number_of_carriages = $faker->numberBetween(1, 100);
            $new_trian->in_time = $faker->numberBetween(0, 1);
            $new_trian->deleted = $faker->numberBetween(0, 1);
            $new_trian->slug = Str::slug($new_trian->arrival_station, '-') . '-' . Str::slug($new_trian->train_code, '-');
            // dump($new_trian);
            $new_trian->save();
        }
    }
}
