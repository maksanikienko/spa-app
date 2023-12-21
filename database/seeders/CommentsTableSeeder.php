<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
       DB::table('comments')->truncate();

       $comments = [
            [
                'user_name' => 'Alice Smith',
                'email' => 'alice@example.com',
                'home_page' => 'https://www.aliceurl.com/',
                'avatar_image_path' => 'Beautifull Girl.jpg',
                'text' => 'Hello, this is Alice.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'Bob Johnson',
                'email' => 'bob@example.com',
                'home_page' => 'https://www.boburl.com/',
                'avatar_image_path' => 'Funny Dad.jpg',
                'text' => 'Greetings from Bob.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'Eve Davis',
                'email' => 'eve@example.com',
                'home_page' => 'https://www.eveurl.com/',
                'avatar_image_path' => 'Girl With Hat.jpg',
                'text' => 'This is Eve saying hi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'Charlie Brown',
                'email' => 'charlie@example.com',
                'home_page' => 'https://www.charlieurl.com/',
                'avatar_image_path' => 'Funny Boy.jpg',
                'text' => 'Charlie checking in.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'Edward Miller',
                'email' => 'edward@example.com',
                'home_page' => 'https://www.millerurl.com/',
                'avatar_image_path' => 'Handsome Guy.jpg',
                'text' => 'Greetings from Edward.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

    ];

    DB::table('comments')->insert($comments);
    }
}
