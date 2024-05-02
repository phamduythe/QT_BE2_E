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
        $now = now();

        DB::table('users')->insert([
            'name' => 'admin1',
            'phone' => '0123456789',
            'email' => 'admin1@gmail.com',
            'image' => 'avatar_defaul.jpg',
            'password' => Bcrypt('admin1'),
        ]);
        DB::table('users')->insert([
            'name' => 'admin2',
            'phone' => '0123456789',
            'email' => 'admin2@gmail.com',
            'image' => 'avatar_defaul.jpg',
            'password' => Bcrypt('admin2'),
        ]);

        //Favorites
        DB::table('favorites')->insert([
            'favorite_name' => 'Đá bóng',
            'favorite_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?',
        ]);

        DB::table('favorites')->insert([
            'favorite_name' => 'Bóng rổ',
            'favorite_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?',
        ]);

        DB::table('favorites')->insert([
            'favorite_name' => 'Cầu lông',
            'favorite_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?',
        ]);

        DB::table('favorites')->insert([
            'favorite_name' => 'Cờ vua',
            'favorite_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?',
        ]);

        DB::table('favorites')->insert([
            'favorite_name' => 'Tennis',
            'favorite_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?',
        ]);

        DB::table('favorites')->insert([
            'favorite_name' => 'Bóng chuyền',
            'favorite_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?',
        ]);

        DB::table('favorites')->insert([
            'favorite_name' => 'Bơi lội',
            'favorite_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?',
        ]);

        //Posts
        DB::table('posts')->insert([
            'post_name' => 'Java',
            'post_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('posts')->insert([
            'post_name' => 'Font-end 2',
            'post_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('posts')->insert([
            'post_name' => 'Python',
            'post_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
