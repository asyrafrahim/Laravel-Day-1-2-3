<?php

use Illuminate\Database\Seeder;

class TrainingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainings')->insert([
            'title' => 'Laravel Training 6 Days(Advanced)',
            'description' => 'The 6 Days training focus on enchanment API to Restful Architecture',
            'trainer' => 'Khirulnizam',
            'user_id' => factory('App\User')->create()->id,
        ]);
    }
}