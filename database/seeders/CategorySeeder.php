<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Kesehatan'],
            ['name' => 'Lingkungan'],
            ['name' => 'Pendidikan'],
            ['name' => 'HAM'],
            ['name' => 'Ekonomi'],
            ['name' => 'Politik'],
            ['name' => 'Sosial'],
            ['name' => 'Teknologi'],
            ['name' => 'Privasi'],
            ['name' => 'Keadilan'],
            ['name' => 'Kesejahteraan Hewan'],
            ['name' => 'Seni'],
            ['name' => 'Budaya'],
            ['name' => 'Transportasi'],
            ['name' => 'Infrastruktur'],
            ['name' => 'Perdamaian'],
            ['name' => 'Konflik'],
            ['name' => 'Makanan'],
            ['name' => 'Kebebasan Berpendapat'],
            ['name' => 'Olahraga'],
            ['name' => 'Disabilitas'],
            ['name' => 'Minoritas'],
            ['name' => 'Lainnya'],
        ];

        $timestamp = Carbon::now();

        foreach ($categories as &$category) {
            $category['created_at'] = $timestamp;
            $category['updated_at'] = $timestamp;
        }

        DB::table('categories')->insert($categories);
    }
}
