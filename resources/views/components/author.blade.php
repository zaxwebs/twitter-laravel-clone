<div class="flex gap-x-1 items-center">
	<div class="font-semibold">{{ $user->name }}</div>
	@if($user->badge)
		<x-codicon-verified-filled class="text-sky-500 h-5"/>
	@endif
	<div class="text-gray-500">{{ '@' . $user->username }}</div>
</div>