<div class="p-3 border-b">
	<div class="flex gap-x-3">
		<x-d-p/>
		<div class="grow">
			<x-author :user="$user"/>
			<div>{{ $body }}</div>
			@if($tweet)
				<div class="p-3 border rounded-2xl mt-3">
					<div class="flex gap-x-1 items-center">
						<x-d-p size="5"/>
						<x-author :user="$tweet->user"/>
					</div>
					<div>{{ $tweet->body }}</div>
				</div>
			@endif
			<div class="flex justify-between pt-3 text-gray-500">
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
