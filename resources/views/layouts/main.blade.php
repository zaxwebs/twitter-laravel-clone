<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">

	<!-- Scripts -->
	<script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous"></script>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex justify-center bg-slate-100 font-sans text-gray-900">
	<div style="max-width: 500px;" class="w-full  bg-white min-h-screen flex flex-col">
		{{ $slot }}

	</div>
	<div style="max-width: 500px;" class="w-full h-screen fixed pointer-events-none">
		<a href="#" style="transform: translateX(-4px);"
			class="flex items-center justify-center text-white bg-sky h-14 w-14 rounded-full drop-shadow-md absolute  bottom-20 right-4 pointer-events-auto">
			<x-feathericon-feather class="h-7" />
		</a>
	</div>

</body>

</html>