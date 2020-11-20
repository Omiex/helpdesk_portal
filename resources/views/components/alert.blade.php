<div x-data="{ open: false }">
	<div class="relative bg-{{ $color }}-100 border-l-4 border-{{ $color }}-500 rounded-r text-{{ $color }}-900 mb-4 px-4 py-3 shadow transform" role="alert"
		x-show="open"
		x-transition:enter="ease-out duration-300"
		x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
		x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
		x-transition:leave="ease-in duration-200"
		x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
		x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
	>
		<div class="flex items-start">
			<div class="py-1">
				<svg class="stroke-current h-6 w-6 text-{{ $color }}-500 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="2 2 20 20">
					@if ($type == 'success')
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
					@elseif ($type == 'warning')
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
					@elseif ($type == 'danger')
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
					@else
					  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
					@endif
				</svg>
			</div>
			<div class="mr-6 self-center" x-show="open" @click.away="open = false">
				{{ $slot }}
			</div>
		</div>
		<div class="absolute top-0 bottom-0 right-0 px-2 py-2">
			<svg @click="open = false" class="fill-current h-6 w-6 text-{{ $color }}-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
				<title>Close</title>
				<path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
			</svg>
		</div>
	</div>
</div>
