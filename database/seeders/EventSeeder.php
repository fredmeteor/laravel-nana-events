<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use App\Models\ZipCode;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('events')->truncate();

        $categories = Category::all();
        $users = User::all();

        $faker = \Faker\Factory::create();

        foreach(range(1,50) as $index)
        {

            $user = $users->random();

            $zipCode = ZipCode::where('zip', $user->zip)->first();

            $category = $categories->random();

            Event::create([
                'user_id'       => $user->id,
                'category_id'   => $category->id,
                'name'          => $faker->sentence(5),
                'oneliner'      => $faker->sentence(5),
                'published'     => rand(0,1),
                'start_date'    => $faker->dateTimeBetween('now', '+45 days')->format("Y-m-d H:i:s"),
                'start_time'    => $faker->dateTimeBetween('now', '+45 days')->format("Y-m-d H:i:s"),
                'max_attendees' => rand(2,5),
                'venue'         => $faker->company,
                'street'        => $faker->streetAddress,
                'city'          => $user->city,
                'state_id'      => $user->state_id,
                'zip'           => $user->zip,
                'lat'           => $zipCode->lat,
                'lng'           => $zipCode->lng,
                'description'   => $faker->paragraphs(3, true),
            ]);

        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
