<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = new User();
        $user->name = 'user';
        $user->email = 'user@ymail.com';
        $user->password = bcrypt('tokemtokem');
        $user->role = 'member';
        $user->save();

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@ymail.com';
        $user->password = bcrypt('tokemtokem');
        $user->role = 'admin';
        $user->save();
    }
}
