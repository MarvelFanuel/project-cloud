<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = [
            [
                'name' => 'Information Technology',
                'slug' => 'it',
                'project_link' => 'https://youtube.com'
            ],
            [
                'name' => 'Creative',
                'slug' => 'creative',
                'project_link' => 'https://youtube.com'
            ],
            [
                'name' => 'Keamanan',
                'slug' => 'keamanan',
                'project_link' => 'https://youtube.com'
            ],
            [
                'name' => 'Perlengkapan',
                'slug' => 'perkap',
                'project_link' => 'https://youtube.com'
            ],
            [
                'name' => 'Sekretariat',
                'slug' => 'sekret',
                'project_link' => 'https://youtube.com'
            ],
            [
                'name' => 'Konsumsi',
                'slug' => 'konsum',
                'project_link' => 'https://youtube.com'
            ],
            [
                'name' => 'Kesehatan',
                'slug' => 'kesehatan',
                'project_link' => 'https://youtube.com'
            ],
            [
                'name' => 'Acara',
                'slug' => 'acara',
                'project_link' => 'https://youtube.com'
            ],
        ];
        foreach ($divisions as $division) {
            \App\Models\Division::create($division);
        }
    }
}
