<x-main-layout>
	<img class="object-cover bg-gray-300 aspect-[3/1]" src="{{ asset($user->cover_image) }}"/>
    <div class="p-4">
		<div class="flex mb-3">
			<x-d-p class="border-4 border-white -mt-20" :image="$user->display_picture" size="32"/>
		</div>
		<div class="font-bold">{{ $user->name }}</div>
		<div class="text-gray-500 mb-3">{{ '@' . $user->username }}</div>
		<div class="mb-3">{{ $user->bio }}</div>
	</div>
	<div class="">
		@foreach ($tweets as $tweet)
			<x-tweet :user="$tweet->user" :body="$tweet->body" :image="$tweet->image" :tweet="$tweet->tweets->first()"/>
		@endforeach
	</div>
</x-main-layout>
