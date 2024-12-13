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
                'project_link' => 'abcde',
            ],
            [
                'name' => 'Creative',
                'slug' => 'creative',
            ],
            [
                'name' => 'Keamanan',
                'slug' => 'keamanan',
            ],
            [
                'name' => 'Perlengkapan',
                'slug' => 'perkap',
            ],
            [
                'name' => 'Sekretariat',
                'slug' => 'sekret',
            ],
            [
                'name' => 'Konsumsi',
                'slug' => 'konsum',
            ],
            [
                'name' => 'Kesehatan',
                'slug' => 'kesehatan',
            ],
            [
                'name' => 'Acara',
                'slug' => 'acara',
            ],
        ];
        foreach ($divisions as $division) {
            \App\Models\Division::create($division);
        }
    }
}
