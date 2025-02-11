<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([UserSeeder::class]);
        // $this->call([AnswerSeeder::class]);
        $this->call([QuestionCategoriesSeeder::class]);
        
        
       
    }
}
