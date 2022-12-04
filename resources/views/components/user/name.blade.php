<a href="{{ route('user.show', ['user' => $user]) }}" class="font-semibold flex items-center hover:underline">
	<span>{{ $user->name }}</span>
	{{ $slot }}
</a>