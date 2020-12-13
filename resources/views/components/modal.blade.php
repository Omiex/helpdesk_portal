@props(['id', 'clear' => "modalOpen = false"])
<div id="{{ $id }}" class="z-40 fixed">
	<div class="max-h-screen overflow-y-auto fixed top-0 inset-x-0 p-2 sm:p-4 flex items-top justify-center"
		x-show="modalOpen"
		x-on:close.stop="{{ $clear }}"
		x-on:keydown.escape.window="{{ $clear }}"
		style="display:none"
	>
		<div class="fixed inset-0 transform transition-all" x-on:click="{{ $clear }}"
			x-show="modalOpen"
			x-transition:enter="ease-out duration-300"
			x-transition:enter-start="opacity-0"
			x-transition:enter-end="opacity-100"
			x-transition:leave="ease-in duration-200"
			x-transition:leave-start="opacity-100"
			x-transition:leave-end="opacity-0"
		>
			<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
		</div>
		<div class="rounded-lg overflow-hidden w-full max-w-2xl shadow-xl transform transition-all"
			@click.away="{{ $clear }}"
			x-show="modalOpen"
			x-transition:enter="ease-out duration-300"
			x-transition:enter-start="opacity-0 -translate-y-8 scale-95"
			x-transition:enter-end="opacity-100 translate-y-0 scale-100"
			x-transition:leave="ease-in duration-200"
			x-transition:leave-start="opacity-100 translate-y-0 scale-100"
			x-transition:leave-end="opacity-0 -translate-y-8 scale-95"
		>
			<div class="bg-white max-h-full overflow-y-auto">
				{{ $slot }}
			</div>
		</div>
	</div>
</div>
