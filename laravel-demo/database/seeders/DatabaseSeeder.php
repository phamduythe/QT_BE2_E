<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'name'=>'admin1',
            'phone' =>'0123456789',
            'email' =>'admin1@gmail.com',
            'image' =>'avatar_defaul.jpg',
            'password' => Bcrypt('admin1'),
        ]);
        DB::table('users')->insert([
            'name'=>'admin2',
            'phone' =>'0123456789',
            'email' =>'admin2@gmail.com',
            'image' =>'avatar_defaul.jpg',
            'password' => Bcrypt('admin2'),
        ]);
    }
}
