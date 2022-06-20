<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeniorityRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seniority_ratings')->insert([
            'title' => 'Junior',
        ]);

        DB::table('seniority_ratings')->insert([
            'title' => 'Intermediate',
        ]);

        DB::table('seniority_ratings')->insert([
            'title' => 'Senior',
        ]);
    }
}
