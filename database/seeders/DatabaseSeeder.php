<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\State;
Use App\Models\ZipCode;
Use App\Models\Event;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

     public function construct(){



     }
    public function run()
    {
       $this->call(StateSeeder::class);
     $this->call(ZipCodeSeeder::class);
       $this->call(UserSeeder::class);
         $this->call(CategorieSeeder::class);
         $this->call(EventSeeder::class);
    }
}