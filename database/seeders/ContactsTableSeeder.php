<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('ja_JP');

        foreach(range(1, 500) as $index) {
            
            $created_at = $faker->unique()->dateTimeBetween('-1 years', 'now');

            Contact::create([
                'name' => $faker->name,
                'mail' => $faker->unique()->safeEmail,
                'title' => $faker->realText(20),
                'content' => $faker->realText(),
                'created_at' => $created_at,
            ]);
        }
            $faker->unique(true);
    }
}
