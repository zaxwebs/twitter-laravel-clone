<x-bottom-bar-layout>
	@php
	$route_name = request()->route()->getName();
	@endphp
	<div class="flex border-b">
		<a href="{{ route('user.followers', ['user' => $user])  }}"
			class="grow flex justify-center hover:bg-gray-200 {{ $route_name == 'user.followers' ? 'font-semibold' : 'font-medium text-gray-500' }}">
			<div>
				<div class="py-3">Followers</div>
				<div class="rounded h-1 {{ $route_name == 'user.followers' ? 'bg-sky-500' : null}}"></div>
			</div>
		</a>
		<a href="{{ route('user.following', ['user' => $user])  }}" class="grow flex items-center justify-center hover:bg-gray-200 {{ $route_name == 'user.following' ? 'font-semibold' :
			'font-medium text-gray-500' }}">
			<div>
				<div class="py-3">Following</div>
				<div class="rounded h-1 {{ $route_name == 'user.following' ? 'bg-sky-500' : null}}"></div>
			</div>
		</a>
	</div>
	@foreach ($users as $user)
	<div class="p-4 border-b">
		<div class="flex gap-x-3">
			<div class="shrink-0">
				<a href="{{ route('user.show', ['user' => $user]) }}">
					<x-d-p :image="$user->display_picture" />
				</a>
			</div>
			<div class="grow">
				<div class="flex items-center justify-between">
					<x-author :user="$user" stacked="false"
						:followers="auth()->check() ? auth()->user()->followers: collect()" />
					<x-follows-button :user="$user" />
				</div>
				{{ $user->bio }}
			</div>
		</div>
	</div>
	@endforeach
</x-bottom-bar-layout>