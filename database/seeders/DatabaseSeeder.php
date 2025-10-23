<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'username' => 'user'
        ]);

        Post::factory(50)->create();

        $users = User::all(); //10
        $posts = Post::all(); //500

        foreach ($users as $user) {
            $userId = $user->id;
            Profile::create([
                'user_id' => $userId,
                "bio" => "Hi, I am " . $user->name . " 😎",
                'avatar' => null,
            ]);
        }

        foreach ($users as $user) {
            foreach ($posts as $post) {
                if (rand(0, 1)) {
                    Like::create([
                        'user_id' => $user->id,
                        'post_id' => $post->id,
                    ]);
                }
                if (rand(0, 1)) {
                    Comment::create([
                        'user_id' => $user->id,
                        'post_id' => $post->id,
                        'comment' => 'This is a sample comment.',
                    ]);
                }
            }
        }
    }

}
