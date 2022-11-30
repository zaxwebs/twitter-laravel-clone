<x-main-layout>
	<div class="px-4 py-1">
		<div class="flex items-center gap-10">
			<a class="w-9 h-9 hover:bg-gray-200 flex items-center justify-center rounded-full -ml-2" href="#"><x-feathericon-arrow-left /></a>
			<div>
				<div class="font-bold flex gap-x-1 items-center">
					<span class="text-xl">{{ $user->name }}</span>
					@if($user->badge)
						<x-codicon-verified-filled class="text-sky-500 h-5"/>
					@endif
				</div>
				<div style="font-size: 13px;" class="text-gray-500 -mt-0.5">370.4K Tweets</div>
			</div>
			
		</div>
		
		
	</div>
	<img class="object-cover bg-gray-300 aspect-[3/1]" src="{{ asset($user->cover_image) }}"/>
    <div class="p-4">
		<div class="flex mb-3">
			<x-d-p class="border-4 border-white -mt-20" :image="$user->display_picture" size="32"/>
		</div>
		<div class="font-bold flex gap-x-1 items-center">
			<span class="text-xl">{{ $user->name }}</span>
			@if($user->badge)
				<x-codicon-verified-filled class="text-sky-500 h-5"/>
			@endif
		</div>
		<div class="text-gray-500 mb-3">{{ '@' . $user->username }}</div>
		<div class="mb-3">{{ $user->bio }}</div>
	</div>
	<div class="border-t">
		@foreach ($tweets as $tweet)
			<x-tweet :user="$tweet->user" :body="$tweet->body" :image="$tweet->image" :tweet="$tweet->tweets->first()"/>
		@endforeach
	</div>
</x-main-layout>
