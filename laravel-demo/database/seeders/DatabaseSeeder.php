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

        for ($i=0; $i < 10; $i++) { 
            $user = $i;
            DB::table('users')->insert([
                'name' => 'test' . $user,
                'phone' => $user,
                'email' => 'test' . $user .'@gmail.com',
                'image' => 'avatar_defaul.jpg',
                'password' => Bcrypt('test123'),
            ]);
        }

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
            'user_id' => '1',
            'post_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('posts')->insert([
            'post_name' => 'Font-end 2',
            'user_id' => '1',
            'post_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('posts')->insert([
            'post_name' => 'Python',
            'user_id' => '1',
            'post_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?',
            'created_at' => $now,
            'updated_at' => $now,
        ]);


        DB::table('user_favorite')->insert([
            'user_id' => '1',
            'favorite_id' => '2',
        ]);

        DB::table('user_favorite')->insert([
            'user_id' => '1',
            'favorite_id' => '7',
        ]);
        
        DB::table('user_favorite')->insert([
            'user_id' => '1',
            'favorite_id' => '4',
        ]);
    }
}
