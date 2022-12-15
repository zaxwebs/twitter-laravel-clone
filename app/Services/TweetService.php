<?php

namespace App\Services;

class TweetService
{
	public function parseTweet($text)
	{
		$text = preg_replace(config('regex.hashtag'), '<a class="text-sky" href="' . url('search/?q=$1') . '">#$1</a>', $text);
		$text = preg_replace(config('regex.mention'), '<a class="text-sky" href="' . url('/$1') . '">@$1</a>', $text);

		return $text;
	}

	public function extractTweetMeta($tweet)
	{
		// Initialize empty arrays for hashtags and mentions
		$hashtags = array();
		$mentions = array();

		// Use regular expressions to extract hashtags and mentions from the tweet text
		preg_match_all(config('regex.hashtag'), $tweet, $hashtags);
		preg_match_all(config('regex.mention'), $tweet, $mentions);

		// Return the tweet array
		return array(
			"hashtags" => $hashtags[1],
			"mentions" => $mentions[1]
		);
	}
}