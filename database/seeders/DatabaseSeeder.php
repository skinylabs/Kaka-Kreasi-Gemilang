<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\TataTertib;
use App\Models\Tour;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('admin123'),
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

        Tour::create([
            'user_id' => 2,
            'name' => 'Tour 1',
            'client' => 'SMK MUHAMMADIYAH 1',
            'slug' => 'tour-1',
            'start_date' => '2025-01-01',
            'end_date' => '2025-01-02',
            'security_password' =>  '123',
        ]);

        Tour::create([
            'user_id' => 3,
            'name' => 'Tour 2',
            'client' => 'SMK MUHAMMADIYAH 2',
            'slug' => 'tour-2',
            'start_date' => '2025-01-01',
            'end_date' => '2025-01-02',
            'security_password' =>  '321',
        ]);
        Link::create([
            'name' => 'Whatsapp',
            'link' => 'https://api.whatsapp.com/send?phone=6281328122688&text=Hai%20Kakatours%20Mau%20tanya%20paket%20liburan%20hemat%20dong',
            'description' => '+6281328122688',
        ]);
        Link::create([
            'name' => 'Instagram',
            'link' => 'https://www.instagram.com/kakatours/',
            'description' => 'Kaka Tours',
        ]);
        Link::create([
            'name' => 'TikTok',
            'link' => 'https://www.tiktok.com/@kaka.tours',
            'description' => 'Kaka Tours',
        ]);
        Link::create([
            'name' => 'Website',
            'link' => 'https://kakakreasigemilang.id',
            'description' => 'kakakreasigemilang.id',
        ]);
        Link::create([
            'name' => 'Maps',
            'link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.298918577141!2d110.68141937460996!3d-7.6509719756942065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a405c3d662c25%3A0x28873f8c59da493a!2sKakaTours%20Office!5e0!3m2!1sen!2sid!4v1730346719310!5m2!1sen!2sid',
            'description' => 'Jl. Raya Solo - Yogyakarta No.KM. 24, Kemen, Dukuh, Kec. Delanggu, Kabupaten Klaten, Jawa Tengah 57471',
        ]);
    }
}
