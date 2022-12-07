<div class="p-4 border-b">
	<div class="flex gap-x-3">
		<div class="shrink-0">
			<a href="{{ route('user.show', ['user' => $user]) }}">
				<x-d-p :image="$user->display_picture" />
			</a>
		</div>
		<div class="grow">
			<x-author :user="$user" />
			<div>@mentions($body)</div>
			@if ($image)
			<img style="max-height: 510px" class="w-full rounded-2xl mt-3 border object-cover object-right"
				src="{{ asset($image) }}" />
			@endif
			@if($tweet)
			<div class="border rounded-2xl mt-3 overflow-hidden">
				<div class="p-4">
					<div class="flex gap-x-1 items-center">
						<a href="{{ route('user.show', ['user' => $tweet->user]) }}">
							<x-d-p :image="$tweet->user->display_picture" size="5" />
						</a>
						<x-author :user="$tweet->user" />
					</div>
					<div>@mentions($tweet->body)</div>
				</div>
				@if ($tweet->image)
				<img style="max-height: 510px" class="w-full object-cover object-right"
					src="{{ asset($tweet->image) }}" />
				@endif
			</div>
			@endif
			<div class="flex justify-between mt-2 text-gray-500">
				<div class="flex gap-4 items-center hover:text-sky">
					<x-feathericon-message-square class="h-4 w-4" />
					<span class="text-sm">{{ rand(2,20) }}</span>
				</div>
				<div class="flex gap-4 items-center hover:text-emerald-500">
					<x-feathericon-repeat class="h-4 w-4" />
					<span class="text-sm">{{ rand(2,20) }}</span>
				</div>
				<div class="flex gap-4 items-center hover:text-pink-500">
					<x-feathericon-heart class="h-4 w-4" />
					<span class="text-sm">{{ rand(2,20) }}</span>
				</div>
				<div class="flex gap-4 items-center hover:text-sky">
					<x-feathericon-share class="h-4 w-4" />
				</div>
			</div>
		</div>
	</div>
</div>