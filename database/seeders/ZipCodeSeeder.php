<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\State;
use App\Models\ZipCode;

class ZipCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::statement( 'TRUNCATE zip_codes' );

        // Process zip codes
        $zipFile = database_path('/seeders/data/zips.csv');

        $data = file($zipFile);

        foreach($data as $line)
        {

            list($zip, $city, $state_id, $latitude, $longitude) = explode(",", trim($line));

            $zipCode = new ZipCode();
            $zipCode->zip = $zip;
            $zipCode->lat = $latitude;
            $zipCode->lng = $longitude;
            $zipCode->city = $city != "" ? str_replace('"', '', $city) : NULL;
            $zipCode->state_id = $state_id;

            $zipCode->save();

        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
