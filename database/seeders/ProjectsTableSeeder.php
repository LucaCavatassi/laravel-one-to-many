<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 15 ; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence(3);
            $newProject->description = $faker->paragraph();
            $newProject->slug = Str::slug($newProject->title);
            $newProject->save();
        }
    }
}
