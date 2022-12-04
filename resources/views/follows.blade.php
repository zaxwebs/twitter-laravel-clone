<x-bottom-bar-layout>
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
					<x-author :user="$user" stacked="false" />
					<x-follows-button :user="$user" :following="auth()->user()->following ?? collect()" />
				</div>

				{{ $user->bio }}
			</div>
		</div>
	</div>
	@endforeach
</x-bottom-bar-layout>