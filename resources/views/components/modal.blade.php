@props(['id', 'clear' => "openModal = false"])
<div id="{{ $id }}" class="z-40 fixed">
	<div x-show="modalOpen"
		x-on:close.stop="{{ $clear }}"
		x-on:keydown.escape.window="{{ $clear }}"
		class="max-h-screen overflow-y-auto fixed top-0 inset-x-0 px-4 py-6 sm:flex sm:items-top sm:justify-center"
		style="display:none"
	>
		<div x-show="modalOpen" class="fixed inset-0 transform transition-all" x-on:click="{{ $clear }}"
			x-transition:enter="ease-out duration-300"
			x-transition:enter-start="opacity-0"
			x-transition:enter-end="opacity-100"
			x-transition:leave="ease-in duration-200"
			x-transition:leave-start="opacity-100"
			x-transition:leave-end="opacity-0"
		>
			<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
		</div>

		<div x-show="modalOpen" @click.away="{{ $clear }}"
			class="bg-white overflow-y-auto rounded-lg shadow-xl transform transition-all sm:w-full sm:max-w-2xl"
			x-transition:enter="ease-out duration-300"
			x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
			x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
			x-transition:leave="ease-in duration-200"
			x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
			x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
		>
			{{ $slot }}
		</div>
	</div>
</div>
