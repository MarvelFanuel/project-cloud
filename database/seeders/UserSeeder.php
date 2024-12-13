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
                ],
                [
                    'name' => 'Michael',
                    'email' => 'c14220121@john.petra.ac.id',
                    'phone' => '0811111111',
                    'address' => 'Jl. Raya Kutisari No. 244',
                    'gender' => 'male',
                    'birth_place' => 'Sidoarjo',
                    'religion' => 'Buddha',
                    'major' => 'Management',
                    'birth_date' => '2004-10-31',
                    'gpa' => 3.1,
                    'line_id' => 'michaelabraham',
                    'instagram' => 'michaelabraham',
                    'motivation' => 'I want to join this organization because I want to learn more about Creative',
                    'strength' => 'Pandai memasak',
                    'weakness' => 'Kurang bisa mengatur waktu',
                    'choice_1' => Division::where('slug', 'creative')->first()->id,
                    'choice_2' => Division::where('slug', 'acara')->first()->id,
                    'organization_experience' => 'I have joined the creative club',
                    'committee_experience' => 'I have joined the creative club',
                    'phase' => 0,
                    'ktm' => 'uploads/ktm/dummy.png',
                    'grade' => 'uploads/grade/dummy.jpg',
                    'cheats' => 'uploads/cheats/dummy.jpg',
                    'photo' => 'uploads/photo/dummy.jpg',
                    'skkk' => 'uploads/skkk/dummy.jpg',
                ],
                [
                    'name' => 'Michelle',
                    'email' => 'c14220119@john.petra.ac.id',
                    'phone' => '123451234',
                    'address' => 'Jl. Siwalankerto No. 1',
                    'gender' => 'female',
                    'birth_place' => 'Surabaya',
                    'religion' => 'Kristen',
                    'major' => 'Accounting',
                    'birth_date' => '2004-12-01',
                    'gpa' => 3.5,
                    'line_id' => 'michellejessica',
                    'instagram' => 'michellejessica',
                    'motivation' => 'Saya ingin belajar dan berkembang di kepanitiaan ini',
                    'strength' => 'Saya orangnya rajin, cepat tanggap, dan pandai membagi waktu',
                    'weakness' => 'Sedikit sulit untuk beradaptasi',
                    'choice_1' => Division::where('slug', 'acara')->first()->id,
                    'choice_2' => Division::where('slug', 'kesehatan')->first()->id,
                    'organization_experience' => 'Saya pernah mengikuti berbagai event sebelumnya seperti wgg dan slt',
                    'committee_experience' => 'Saya pernah mengikuti berbagai event sebelumnya seperti wgg dan slt',
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
