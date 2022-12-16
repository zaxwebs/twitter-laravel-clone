<?php

namespace App\Providers;

use App\Services\TweetService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class TweetServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{

	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Blade::directive('parseTweet', function ($expression) {
			return "<?php echo app(App\Services\TweetService::class)->parseTweet({$expression}); ?>";
		});
	}
}