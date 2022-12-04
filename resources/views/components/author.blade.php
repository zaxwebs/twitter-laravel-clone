<div class="flex gap-x-1 {{ $stacked ? 'flex-col' : 'items-center' }}">
	<x-user.name-mark :user="$user" />
	<x-user.username :user="$user" />
</div>