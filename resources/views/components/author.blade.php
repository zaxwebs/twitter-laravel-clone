<div class="flex gap-x-1 items-center">
	<a  href="{{ route('user.show', ['user' => $user]) }}" class="font-semibold flex items-center hover:underline">
		<span>{{ $user->name }}</span>
		@if($user->badge)
			<x-codicon-verified-filled class="text-sky-500 h-5 ml-0.5"/>
		@endif
	</a>
	<a  href="{{ route('user.show', ['user' => $user]) }}"  class="text-gray-500">{{ '@' . $user->username }}</a>
</div>