<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@srun.com',
            'password' => Hash::make('password'),
            'privilage' => 2,
            'picture' => '/default_profilepic.png',
            'status' => 0,
            'twitch_link' => 'www.twitch.com',
            'steam_link' => 'store.steampowered.com'
        ]);
        User::create([
            'name' => 'Mod',
            'email' => 'mod@srun.com',
            'password' => Hash::make('password'),
            'privilage' => 1,
            'picture' => '/default_profilepic.png',
            'status' => 0,
            'twitch_link' => 'www.twitch.com',
            'steam_link' => 'store.steampowered.com'
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@srun.com',
            'password' => Hash::make('password'),
            'privilage' => 0,
            'picture' => '/default_profilepic.png',
            'status' =>0,
            'twitch_link' => 'www.twitch.com',
            'steam_link' => 'store.steampowered.com'
        ]);
        Category::create([
            'categories' => 'Re-Volt (1999)'
        ]);
        Category::create([
            'categories' => 'Need For Speed Hot Pursuit 2 (2002)'
        ]);
        Category::create([
            'categories' => 'Need For Speed Underground (2003)'
        ]);
        Category::create([
            'categories' => 'Need For Speed Underground 2 (2004)'
        ]);
        Category::create([
            'categories' => 'Need For Speed Most Wanted (2005)'
        ]);
        Category::create([
            'categories' => 'Need For Speed Cabron (2006)'
        ]);
    }
}
