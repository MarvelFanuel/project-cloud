<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'birth_place',
        'religion',
        'major',
        'birth_date',
        'gpa',
        'line_id',
        'instagram',
        'motivation',
        'strength',
        'weakness',
        'choice_1',
        'choice_2',
        'organization_experience',
        'committee_experience',
        'ktm',
        'grade',
        'skkk',
        'photo',
        'cheats',
        'phase',
        'acceptance',
        'portfolio',
        'project_deadline_1',
        'project_deadline_2',
        'project_link_1',
        'project_link_2',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function choice1()
    {
        return $this->belongsTo(Division::class, 'choice_1', 'id');
    }
    public function choice2()
    {
        return $this->belongsTo(Division::class, 'choice_2', 'id');
    }
}
