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
		
		// Replace each hashtag with a link to a search page for that hashtag
		// preg_match_all(self::$hashtag_pattern, $text, $hashtags);
		// foreach ($hashtags[1] as $hashtag) {
		// 	...
		// }
		$text = preg_replace(self::$hashtag_pattern, '<a class="text-sky" href="'. url('search/?q=$1').'">#$1</a>', $text);  

		// Replace each @ mention with a link to the user's profile page
		$text = preg_replace(self::$mention_pattern, '<a class="text-sky" href="'. url('/$1').'">@$1</a>', $text);  

		return $text;
	}

	public static function extract_hastags($text)
	{
		preg_match_all(self::$hashtag_pattern, $text, $hashtags);
		return $hashtags;
	}


}