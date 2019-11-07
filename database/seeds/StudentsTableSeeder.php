<?php

use App\Student;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();

        Student::create([
            'name' => 'test1',
            'email' => 'test@example.com',
            'tel' => '09057155509'
        ]);

        $faker = Faker::create('ja_JP');

        for ($i = 0; $i < 50; $i++)
        {
            Student::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'tel' => $faker->phoneNumber,
            ]);
        }
    }
}
