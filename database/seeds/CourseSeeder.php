<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'course_name' => 'Computer Science',
            ],
            [
                'course_name' => 'Mathematics',
            ],
            [
                'course_name' => 'Physics',
            ],
        ]);
    }
}
