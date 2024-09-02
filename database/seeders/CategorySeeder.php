<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Faker\Provider\cs_CZ\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        // Define how many categories you want to create
        $numberOfCategories = 50;

        // Create fake categories
        for ($i = 0; $i < $numberOfCategories; $i++) {
            $name = $faker->sentence(2);
            Category::create([
                'slug' => $this->slugify($name),
                'title' => $name,
                'short_description' => $faker->sentence(10),
                'description' => $faker->paragraph(),
                'status' => 1,
            ]);
        }
    }

    public function slugify($string, $separator='-'): string{
        // Convert the string to lowercase
        $string = strtolower($string);

        // Replace non-alphanumeric characters with the separator
        $string = preg_replace('/[^a-z0-9]+/', $separator, $string);

        // Remove leading and trailing separator
        $string = trim($string, $separator);

        return $string;
    }
}
