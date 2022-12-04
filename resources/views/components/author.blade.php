<div class="flex gap-x-1 {{ $stacked ? 'flex-col' : 'items-center' }}">
	<x-user.name-mark :user="$user" />
	<div class="flex items-center">
		<x-user.username :user="$user" />
		@if(auth()->check())
		@if($followers->contains($user))
		<div class="text-xs ml-1 bg-gray-100 text-gray-600 py-0.5 px-1 rounded">Follows You</div>
		@endif
		@endif
	</div>
</div>