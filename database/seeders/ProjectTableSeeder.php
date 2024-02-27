<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;
use App\Models\Type;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Project :: factory()
      -> count(10) 
      -> make()
      ->each(function($project){

        $type = Type :: inRandomOrder() -> first();
        $project -> type() -> associate($type);
        $project -> save();
      });
    }
}
