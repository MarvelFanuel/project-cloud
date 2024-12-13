<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =
            [
                [
                    'name' => 'Jeffry Hermawan',
                    'email' => 'c14220139@john.petra.ac.id',
                    'phone' => '081234567890',
                    'address' => 'Jl. Raya Jemursari No. 244',
                    'gender' => 'male',
                    'birth_place' => 'Surabaya',
                    'religion' => 'Kristen',
                    'major' => 'Informatics',
                    'birth_date' => '2003-12-31',
                    'gpa' => 3.5,
                    'line_id' => 'jeffryhermawan',
                    'instagram' => 'jeffryhermawan',
                    'motivation' => 'I want to join this organization because I want to learn more about IT',
                    'strength' => 'I am good at programming',
                    'weakness' => 'I am not good at designing',
                    'choice_1' => Division::where('slug', 'it')->first()->id,
                    'choice_2' => Division::where('slug', 'creative')->first()->id,
                    'organization_experience' => 'I have joined the programming club',
                    'committee_experience' => 'I have joined the programming club',
                    'phase' => 0,
                    'ktm' => 'uploads/ktm/dummy.png',
                    'grade' => 'uploads/grade/dummy.jpg',
                    'cheats' => 'uploads/cheats/dummy.jpg',
                    'photo' => 'uploads/photo/dummy.jpg',
                    'skkk' => 'uploads/skkk/dummy.jpg',
                ]
            ];
        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
