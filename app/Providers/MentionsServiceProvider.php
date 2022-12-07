<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class MentionsServiceProvider extends ServiceProvider
{
	public static $hashtag_pattern = '/#([^\s]+)/';
	public static $mention_pattern = '/@([A-Za-z0-9_]+)/';

	public function register()
	{
		//
	}


	public function boot()
	{
		// Register the @hashtags blade directive
		Blade::directive('mentions', function ($expression) {
			return "<?php echo App\Providers\MentionsServiceProvider::parse_mentions($expression); ?>";
		});
	}

	// TODO: Enhance regex to match that of Twitter's
	// TODO: Fix # matching when there are hashtags that start with same characters
	// TODO: Escape HTML
	public static function parse_mentions($text)
	{
		preg_match_all(self::$hashtag_pattern, $text, $hashtags);
		// Replace each hashtag with a link to a search page for that hashtag
		foreach ($hashtags[1] as $hashtag) {
			$searchUrl = url('search?q=' . $hashtag);
			$text = str_replace('#' . $hashtag, '<a class="text-sky" href="' . $searchUrl . '">#' . $hashtag . '</a>', $text);
		}
		// Use a regular expression to find @ mentions in the text
		preg_match_all(self::$mention_pattern, $text, $mentions);
		// Replace each @ mention with a link to the user's profile page
		foreach ($mentions[1] as $mention) {
			$profileUrl = url('/' . $mention);
			$text = str_replace('@' . $mention, '<a class="text-sky" href="' . $profileUrl . '">@' . $mention . '</a>', $text);
		}
		return $text;
	}

	public static function extract_hastags($text)
	{
		preg_match_all(self::$hashtag_pattern, $text, $hashtags);
		return $hashtags;
	}


}