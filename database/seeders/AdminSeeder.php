<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'email' => 'c14220139@john.petra.ac.id',
                'name' => 'Jeffry Hermawan',
                'division_id' => Division::where('slug', 'it')->first()->id,
            ],
            [
                'email' => 'c14220153@john.petra.ac.id',
                'name' => 'Abraham Christopher',
                'division_id' => Division::where('slug', 'it')->first()->id,
            ],
            [
                'email' => 'c14220113@john.petra.ac.id',
                'name' => 'Marvel Fanuel',
                'division_id' => Division::where('slug', 'it')->first()->id,
            ],
        ];
        foreach ($admins as $admin) {
            \App\Models\Admin::create($admin);
        }
    }
}
