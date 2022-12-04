@if(auth()->id() !== $user->id)
<form method="POST" action="{{ route('follow', ['user' => $user]) }}">
	@csrf
	@if($isFollowing)
	<button type="submit" class="font-medium px-4 py-1.5 rounded-full border">
		Following
	</button>
	@else
	<button type="submit" class="bg-black hover:bg-gray-800 text-white font-medium px-4 py-1.5 rounded-full">
		Follow
	</button>
	@endif
</form>
@endif