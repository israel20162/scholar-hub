<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\Models\Quiz;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\ForumPostReply::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $users = User::all();
        if ($users->count() === 0) {
            echo "No users found. Please create some users!";
            return;
        }

        foreach ($users as $user) {
            Quiz::factory(1)->create(['user_id' => $user->id]);
            //Topic::factory(10)->create(['user_id' => $user->id]);
            //ForumPost::factory(10)->create(['user_id' => $user->id]);
        }
    }
}
