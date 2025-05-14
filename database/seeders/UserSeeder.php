<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create()->each(function ($user) {
            // Create profile for each user
            $user->profile()->create(Profile::factory()->make()->toArray());

            // Attach 1-2 random roles to each user
            $roles = Role::inRandomOrder()->take(rand(1, 2))->pluck('id');
            $user->roles()->attach($roles);
        });
    }
}
