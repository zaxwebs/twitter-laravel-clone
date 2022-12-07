<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Hashtag;
use App\Models\Tweet;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Helpers\TweetHelper;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$numbers = [
			'users' => 20,
			'hashtags' => 40,
			'tweets' => 140,
		];

		$users = User::factory($numbers['users'])->create();
		$hashtags = Hashtag::factory($numbers['hashtags'])->create();

		// Tweets
		$tweet_body = [
			"Just saw a really cool cat video on YouTube #catlovers #funnycats @YouTube",
			"I can't believe it's already December! Time flies #december #holidays @all",
			"I love a good cup of coffee in the morning #coffee #wakeup @Starbucks",
			"Anyone else excited for the weekend? #friday #weekendvibes @all",
			"I just finished a great book #reading #booklover @bookstagram",
			"I'm so excited for the new Star Wars movie #StarWars #TheRiseOfSkywalker @Disney",
			"Can't wait to go on vacation #travel #vacationmode @all",
			"I just discovered the best pizza place in town #pizza #foodie @pizzalover",
			"I love going for a run in the park #fitness #exercise @all",
			"I'm so excited for the holiday season #holidays #christmas @all",
			"I just got a new job! #newjob #career @all",
			"I can't wait to go to the beach #beach #summer @all",
			"I'm so excited to see my friends and family #friends #family @all",
			"I love listening to music #music #favoriteartist @all",
			"I'm so excited to try a new restaurant #food #newrestaurant @all",
			"I love going to concerts #concerts #music @all",
			"I'm so excited for the new season of my favorite show #tv #favorite @all",
			"I can't wait to go on a road trip #roadtrip #travel @all",
			"I'm so excited to try a new hobby #hobbies #newbeginnings @all",
		];

		$tweets = [];
		$files = collect(File::files(public_path('seeder/photos')));

		for ($i = 0; $i < $numbers['tweets']; $i++) {

			//setup & defaults
			$date = Carbon::now();
			$image = '';

			if (rand(1, 100) <= 30) {
				// 30% of tweets should have images
				$image = 'seeder/photos/' . $files->random()->getFilename();

			}

			$tweets[] = [
				'user_id' => $users->random()->id,
				'body' => fake()->paragraph(1),
				'image' => $image,
				'created_at' => $date,
				'updated_at' => $date
			];
		}
		\DB::table('tweets')->insert($tweets);

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

		$mentions = [];
		foreach ($tweets->where('image', '') as $tweet) {
			if (rand(1, 100) <= 20) {
				$mentions[] = [
					'mentionnable_id' => $tweets->where('tweet_id', '!=', $tweet->id)->random()->id,
					'mentionnable_type' => 'App\Models\Tweet',
					'tweet_id' => $tweet->id,
					'created_at' => $date,
					'updated_at' => $date
				];
			}
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
		foreach ($users as $user) {
			foreach ($users->random(rand(6, 15)) as $followed_user) {
				$date = Carbon::now()->subDays(rand(0, 4))->format('Y-m-d H:i:s');
				$follows[] = [
					'follower_id' => $user->id,
					'followed_id' => $followed_user->id,
					'created_at' => $date,
					'updated_at' => $date
				];
			}
		}
		\DB::table('follows')->insert($follows);
	}
}