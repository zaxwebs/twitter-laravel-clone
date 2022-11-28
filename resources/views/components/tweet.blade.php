<div class="p-3 border-b">
	<div class="flex gap-x-3">
		<x-d-p :image="$user->display_picture"/>
		<div class="grow">
			<x-author :user="$user"/>
			<div>{{ $body }}</div>
			@if ($image)
				<img style="max-height: 510px" class="w-full rounded-2xl mt-3 border object-cover" src="{{ asset($image) }}"/>
			@endif
			@if($tweet)
				<div class="border rounded-2xl mt-3 overflow-hidden">
					<div class="p-3">
						<div class="flex gap-x-1 items-center">
							<x-d-p :image="$tweet->user->display_picture" size="5"/>
							<x-author :user="$tweet->user"/>
						</div>
						<div>{{ $tweet->body }}</div>
					</div>
					@if ($tweet->image)
						<img style="max-height: 510px" class="w-full object-cover" src="{{ asset($tweet->image) }}"/>
					@endif
				</div>
			@endif
			<div class="flex justify-between mt-2 text-gray-500">
				<div class="flex gap-3 items-center hover:text-sky-500">
					<x-feathericon-message-square class="h-4 w-4"/>
					<span class="text-sm">{{ rand(2,20) }}</span>
				</div>
				<div class="flex gap-3 items-center hover:text-emerald-500">
					<x-feathericon-repeat class="h-4 w-4"/>
					<span class="text-sm">{{ rand(2,20) }}</span>
				</div>
				<div class="flex gap-3 items-center hover:text-pink-500">
					<x-feathericon-heart class="h-4 w-4"/>
					<span class="text-sm">{{ rand(2,20) }}</span>
				</div>
				<div class="flex gap-3 items-center hover:text-sky-500">
					<x-feathericon-share class="h-4 w-4"/>
				</div>
			</div>
		</div>
	</div>
</div>
