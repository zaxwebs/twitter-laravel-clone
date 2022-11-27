<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Hashtag;
use App\Models\Tweet;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		// User::factory()->create([
        //     'name' => 'Zack Webster',
        //     'email' => 'zack@example.com',
        // ]);
        $users = User::factory(30)->hasTweets(2)->create();
		$hashtags = Hashtag::factory(40)->create();

		// Mentions
		
		$tweets = Tweet::all();
		foreach ($hashtags as $hashtag) {
            foreach ($tweets->random(rand(0, 2)) as $tweet) {
				$date = Carbon::now()->subDays(rand(0, 4))->format('Y-m-d H:i:s');
                $mentions[] = [
                    'mentionnable_id' => $hashtag->id,
                    'mentionnable_type' => 'App\Models\Hashtag',
                    'tweet_id' => $tweet->id,
					'created_at' => $date,
					'updated_at' => $date
                ];
            }
        }
		foreach ($users as $user) {
            foreach ($tweets->random(rand(0, 2)) as $tweet) {
				$date = Carbon::now()->subDays(rand(0, 4))->format('Y-m-d H:i:s');
                $mentions[] = [
                    'mentionnable_id' => $user->id,
                    'mentionnable_type' => 'App\Models\User',
                    'tweet_id' => $tweet->id,
					'created_at' => $date,
					'updated_at' => $date
                ];
            }
        }
		\DB::table('mentions')->insert($mentions);

		//Retweets
		foreach ($tweets->random(10) as $tweet) {
				$retweet = $tweets->random();
				$date = Carbon::now()->subDays(rand(0, 4))->format('Y-m-d H:i:s');
				$mentions[] = [
					'mentionnable_id' => $retweet->id,
                    'mentionnable_type' => 'App\Models\Tweet',
                    'tweet_id' => $tweet->id,
					'created_at' => $date,
					'updated_at' => $date
				];
		}
		\DB::table('mentions')->insert($mentions);

		// Likes
		// TBH this can be done the same order as above

		foreach ($tweets as $tweet) {
			foreach ($users->random(rand(0, 2)) as $user) {
				$date = Carbon::now()->subDays(rand(0, 4))->format('Y-m-d H:i:s');
				$likes[] = [
					'user_id' => $user->id,
					'likeable_id' => $tweet->id,
                    'likeable_type' => 'App\Models\Tweet',
					'created_at' => $date,
					'updated_at' => $date
				];
			}
		}
		\DB::table('likes')->insert($likes);

		// Follows
		foreach ($users->random(20) as $user) {
			foreach ($users->random(rand(6,10)) as $followed_user) {
				$date = Carbon::now()->subDays(rand(0, 4))->format('Y-m-d H:i:s');
				$follows[] = [
					'user_id' => $user->id,
					'followed_user_id' => $followed_user->id,
					'created_at' => $date,
					'updated_at' => $date
				];
			}
		}
		\DB::table('follows')->insert($follows);
    }
}
