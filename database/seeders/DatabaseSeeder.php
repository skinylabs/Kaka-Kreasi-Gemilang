<?php

namespace Database\Seeders;

use App\Models\TataTertib;
use App\Models\Tour;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'    => 'Admin',
            'email'    => 'admin@admin.com',
            'role'    => 'admin',
            'password'    => bcrypt('admin123')
        ]);
        User::create([
            'name'    => 'user satu',
            'email'    => 'user1@example.com',
            'role'    => 'user',
            'password'    => bcrypt('user1')
        ]);
        User::create([
            'name'    => 'user dua',
            'email'    => 'user2@example.com',
            'role'    => 'user',
            'password'    => bcrypt('user2')
        ]);

        TataTertib::create([
            'title'      => 'Tata Tertib Default',
            'is_default' => true,
        ]);

        TataTertib::create([
            'title'      => 'Tata Tertib 1',
            'is_default' => false,
        ]);

        TataTertib::create([
            'title'      => 'Tata Tertib 2',
            'is_default' => false,
        ]);

        // Tour::create([
        //     'user_id' => 2,
        //     'name' => 'Tour 1',
        //     'client' => 'SMK MUHAMMADIYAH 1',
        //     'slug' => 'tour-1',
        //     'start_date' => '2025-01-01',
        //     'end_date' => '2025-01-02'
        // ]);

        // Tour::create([
        //     'user_id' => 3,
        //     'name' => 'Tour 2',
        //     'client' => 'SMK MUHAMMADIYAH 2',
        //     'slug' => 'tour-2',
        //     'start_date' => '2025-01-01',
        //     'end_date' => '2025-01-02'
        // ]);
    }
}
