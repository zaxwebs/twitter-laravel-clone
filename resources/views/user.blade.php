<x-main-layout>
	<div class="px-4 py-2 flex items-center sticky top-0 bg-white/90 backdrop-blur-md">
		<div class="flex gap-10 items-center">
			<a class="w-9 h-9 hover:bg-gray-200 flex items-center justify-center rounded-full -ml-2"
				href="{{ url()->previous() }}">
				<x-feathericon-arrow-left />
			</a>
			<div>
				<div class="font-bold flex gap-x-1 items-center">
					<span class="text-xl">{{ $user->name }}</span>
					@if($user->badge)
					<x-codicon-verified-filled class="text-sky-500 h-5" />
					@endif
				</div>
				<div style="font-size: 13px;" class="text-gray-500 -mt-0.5">370.4K Tweets</div>
			</div>

		</div>
	</div>
	<img class="object-cover bg-gray-300 aspect-[3/1]" src="{{ asset($user->cover_image) }}" />
	<div class="p-4">
		<div class="flex mb-3 justify-between">
			<x-d-p class="border-4 border-white -mt-20" :image="$user->display_picture" size="32" />
			@if(auth()->id() !== $user->id)
			<form>
				<button
					class="bg-black hover:bg-gray-800 text-white font-semibold px-4 py-1.5 rounded-full">Follow</button>
			</form>
			@endif
		</div>
		<div class="font-bold flex gap-x-1 items-center">
			<span class="text-xl">{{ $user->name }}</span>
			@if($user->badge)
			<x-codicon-verified-filled class="text-sky-500 h-5" />
			@endif
		</div>
		<div class="text-gray-500 mb-3">{{ '@' . $user->username }}</div>
		<div class="mb-3">{{ $user->bio }}</div>
	</div>
	<div class="border-t">
		@foreach ($tweets as $tweet)
		<x-tweet :user="$tweet->user" :body="$tweet->body" :image="$tweet->image" :tweet="$tweet->tweets->first()" />
		@endforeach
	</div>
	<div class="px-4 py-2 flex items-center sticky bottom-0 bg-white border-t">
		Hello World
	</div>
</x-main-layout>