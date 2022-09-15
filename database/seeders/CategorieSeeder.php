<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();

        $categories = [
            '.NET',
            'C',
            'Databases',
            'Go',
            'IoT',
            'Java',
            'JavaScript',
            'Kotlin',
            'Machine Learning',
            'Objective-C',
            'Perl',
            'PHP',
            'Python',
            'R',
            'Ruby',
            'Scala',
            'Scratch',
            'SQL',
            'Swift'
        ];

        foreach ($categories as $category)
        {
            Category::create([
                'name' => $category
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
