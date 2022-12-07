<x-bottom-bar-layout>
	<x-top-bar>
		<div class="flex gap-10 items-center px-4 py-2 ">
			<a class="w-9 h-9 hover:bg-gray-200 flex items-center justify-center rounded-full -ml-2"
				href="{{ url()->previous() }}">
				<x-feathericon-arrow-left />
			</a>
			<div>
				<div class="font-bold flex gap-x-1 items-center">
					<span class="text-xl">{{ $user->name }}</span>
					<x-user.mark :user="$user" />
				</div>
				<div style="font-size: 13px;" class="text-gray-500 -mt-0.5">370.4K Tweets</div>
			</div>
		</div>
	</x-top-bar>
	<img class="object-cover bg-gray-300 aspect-[3/1] w-full" src="{{ asset($user->cover_image) }}" />
	<div class="p-4">
		<div class="flex mb-3 justify-between">
			<x-d-p class="border-4 border-white -mt-20" :image="$user->display_picture" size="32" />
			<x-follows-button :user="$user" />
		</div>
		<div class="font-bold flex gap-x-1 items-center">
			<span class="text-xl">{{ $user->name }}</span>
			<x-user.mark :user="$user" />
		</div>
		<div class="text-gray-500 mb-3">{{ '@' . $user->username }}</div>
		<div class="mb-3">
			<x-user.bio :user="$user" />
		</div>
		<div style="font-size: 15px;" class="mb-3 text-gray-500">
			<div class=" flex gap-0.5 items-center">
				<x-feathericon-calendar class="h-4" /> <span>Joined {{ $user->toArray()['created_at'] }}</span>
			</div>
		</div>
		<div class="flex gap-5 text-sm">
			<a href="{{ route('user.followers', ['user' => $user])  }}" class="hover:underline">
				<span class="font-medium">{{ $user->followers->count() }}</span>
				<span class="text-gray-500 ">Followers</span>
			</a>
			<a href="{{ route('user.following', ['user' => $user])  }}" class="hover:underline ">
				<span class="font-medium">{{ $user->following->count() }}</span>
				<span class="text-gray-500 ">Following</span>
			</a>
		</div>
	</div>

	<div class="border-t">
		@foreach ($tweets as $tweet)
		<x-tweet :user="$tweet->user" :body="$tweet->body" :image="$tweet->image" :tweet="$tweet->tweets->first()" />
		@endforeach
	</div>
</x-bottom-bar-layout>