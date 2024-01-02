<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $galleryImages = [];
            for ($i = 0; $i < 3; $i++) {
                $galleryImages[] = $faker->imageUrl();
            }

            DB::table('products')->insert([
                'title' => $faker->word,
                'slug' => $faker->slug,
                'image' => $faker->imageUrl(),
                'gallary_image' => implode(',', $galleryImages),
                'price' => $faker->numberBetween(100, 1000), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
