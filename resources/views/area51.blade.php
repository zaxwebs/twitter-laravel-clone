<x-guest-layout>
	<div class="max-w-lg">
		<div class="">
			@foreach ($tweets as $tweet)
				<x-tweet :user="$tweet->user" :body="$tweet->body" :tweet="$tweet->tweets->first()"/>
			@endforeach
		</div>
	</div>
</x-guest-layout>