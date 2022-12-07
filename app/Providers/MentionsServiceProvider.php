<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class MentionsServiceProvider extends ServiceProvider
{
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

	//TODO: enhance regex to match that of Twitter's
	public static function parse_mentions($text)
	{
		// Use a regular expression to find hashtags in the text
		$pattern = '/#([^\s]+)/';
		preg_match_all($pattern, $text, $hashtags);
		// Replace each hashtag with a link to a search page for that hashtag
		foreach ($hashtags[1] as $hashtag) {
			$searchUrl = url('search?query=%23' . $hashtag);
			$text = str_replace('#' . $hashtag, '<a class="text-twitter" href="' . $searchUrl . '">#' . $hashtag . '</a>', $text);
		}
		// Use a regular expression to find @ mentions in the text
		$pattern = '/@([A-Za-z0-9_]+)/';
		preg_match_all($pattern, $text, $mentions);
		// Replace each @ mention with a link to the user's profile page
		foreach ($mentions[1] as $mention) {
			$profileUrl = url('/' . $mention);
			$text = str_replace('@' . $mention, '<a class="text-twitter" href="' . $profileUrl . '">@' . $mention . '</a>', $text);
		}
		return $text;
	}


}