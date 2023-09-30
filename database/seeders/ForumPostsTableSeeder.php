<?php

namespace Database\Seeders;

use App\Models\ForumPost;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForumPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        if ($users->count() === 0) {
            echo "No users found. Please create some users!";
            return;
        }

        foreach ($users as $user) {
             Topic::factory(10)->create(['user_id' => $user->id]);
            //ForumPost::factory(10)->create(['user_id' => $user->id]);
        }
    }
}
