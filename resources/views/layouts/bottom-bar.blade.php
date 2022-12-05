<x-main-layout>
	{{ $slot }}
	<div class="px-4 flex items-center sticky bottom-0 bg-white border-t border-gray-100 text-2xl justify-around">
		<a href="{{ route('home') }}" class="p-3">
			@if(request()->route()->getName() == 'home')
			<x-bxs-home-circle class="h-7 w-7" />
			@else
			<x-bx-home-circle class="h-7 w-7" />
			@endif
		</a>
		<a href="#" class="p-3">
			<x-bx-search class="h-7 w-7" />
		</a>
		<a href="#" class="p-3">
			<x-bx-bell class="h-7 w-7" />
		</a>
		<a href="#" class="p-3">
			<x-bx-envelope class="h-7 w-7" />
		</a>
	</div>
</x-main-layout>