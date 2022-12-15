<?php

namespace Database\Seeders\Helpers;

class Tweet
{
	public $hashtag_pattern = config('regex.hashtag');
	public $mention_pattern = config('regex.mention');
	public $tweet_templates = [
		"Just got back from a long day at the #office, feeling exhausted but accomplished. #hustle",
		"Can't believe it's already Friday! Time flies when you're having fun. #weekendvibes",
		"Guys, I just bought tickets to a pop concert I'm super excited about! ⚡️",
		"Brunch with #friends is the best way to start the day. #avocadotoast",
		"Finished a tough workout, feeling strong and energized. #fitnessmotivation",
		"Tried a new recipe for dinner tonight and it turned out amazing. #cookingisfun",
		"Can't wait to curl up with a good book tonight. #readingislife",
		"Discovered a new favorite band. Their music is so amazing. #musicdiscovery",
		"Had a great #meeting with some new clients today. Exciting things are coming. 🚀",
		"Booked a trip to a new destination. Can't wait to explore. 💯",
		"Had a fun night out with friends. Love spending time with the people I care about. #friends",
		"Finished a challenging project at work. Feeling proud and accomplished. #hardworkpaysoff",
		"Can't believe how fast this year is flying by. Time to start planning for the future. #newyearnewgoals",
		"Started a new hobby and I'm loving it. #nevertoooldtolearn",
		"Found a hidden gem of a #restaurant in the city. Food was amazing. #foodie",
		"Just finished a great workout and feeling ready to conquer the day. ✌",
		"Can't wait to see my favorite band live in concert next month. #concertsarelife",
		"Booked a dream vacation. Can't wait to relax and unwind. #vacationmode",
		"Had a great conversation with an old friend today. Love catching up.",
		"Completed a DIY project at home and it turned out even better than I hoped. 🥳 #diy",
		"Had a productive day at the office. Feeling accomplished and ready for the weekend. #workhardplayhard",
		"Learned a new skill and it's already come in handy. #learningisfun",
		"Can't wait for the #weekend to relax and recharge. #selfcare",
		"Found a new favorite book and I can't put it down. #booklover",
		"Had a fun date night with my significant other. Love spending time together. #datenight",
		"Just signed up for a new class and I'm excited to #learn something new.",
		"Can't wait to try out a new restaurant with friends this weekend. #foodieadventures",
		"Just finished a long #run and feeling great 🥳. Love the feeling of pushing myself. #runnershigh",
		"Had a great day #exploring a new city. So much to see and do. #cityexplorer",
		"Started a new job and I'm loving it. Feeling grateful and excited for the future. #newjobnewadventures",
		"🎯 The only way to do great work is to love what you do.",
		"Success is not final, failure is not fatal: It is the courage to continue that counts.",
		"The only limit to our realization of tomorrow will be our doubts of today.",
		"If you look at what you have in life, you'll always have more. If you look at what you don't have in life, you'll never have enough.",
		"Successful people do what unsuccessful people are not willing to do. Don't wish it were easier; wish you were better.",
		"Hey @username, thanks for the #shoutout on your latest blog post!",
		"Can't believe I won the #contest, thanks for organizing @username!",
		"Shoutout to @username for always being there to support me.",
		"✨ Learned a new technique thanks to @username, can't wait to try it out tomorrow.",
		"Just tried out the new sushi place in town, thanks for the recommendation @username!"
	];

	function replaceUsername($string, $username)
	{
		return str_replace('@username', '@' . $username, $string);
	}

	function getPreparedTweet($username)
	{
		$tweet_templates = $this->tweet_templates;
		$tweet_template = $tweet_templates[array_rand($tweet_templates)];
		return $this->replaceUsername($tweet_template, $username);
	}

	public function extractTweetMeta($tweet)
	{
		// Initialize empty arrays for hashtags and mentions
		$hashtags = array();
		$mentions = array();

		// Use regular expressions to extract hashtags and mentions from the tweet text
		preg_match_all($this->hashtag_pattern, $tweet, $hashtags);
		preg_match_all($this->mention_pattern, $tweet, $mentions);

		// Return the tweet array
		return array(
			"hashtags" => $hashtags[1],
			"mentions" => $mentions[1]
		);
	}
}