<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('question_categories')->insert([
            'type' => 'Jawaban Singkat',
        ]);
        DB::table('question_categories')->insert([
            'type' => 'Jawaban Panjang',
        ]);
        DB::table('question_categories')->insert([
            'type' => 'Email',
        ]);
        DB::table('question_categories')->insert([
            'type' => 'Skala',
        ]);
        DB::table('question_categories')->insert([
            'type' => 'Pilihan Ganda',
        ]);
        DB::table('question_categories')->insert([
            'type' => 'Dropdown',
        ]);
        DB::table('question_categories')->insert([
            'type' => 'Pilihan Banyak',
        ]);
        DB::table('question_categories')->insert([
            'type' => 'Tanggal',
        ]);
        DB::table('question_categories')->insert([
            'type' => 'Waktu',
        ]);
        DB::table('question_categories')->insert([
            'type' => 'File Upload',
        ]);
        DB::table('question_categories')->insert([
            'type' => 'Lokasi',
        ]);

    }
}
