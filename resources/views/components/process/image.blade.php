@props(['src', 'id'])
<div x-data="ticketImage()" x-init="define({{ $id }})">
	<img id="thumbnail-{{ $id }}" role="button"
		class="rounded shadow-lg transform transition-all"
		x-show="thumbnailShow"
		src="{{ asset($src) }}" alt="{{ $src }}" loading="lazy"
		x-transition:enter="ease-out duration-300"
		x-transition:enter-start="opacity-0 scale-150"
		x-transition:enter-end="opacity-100 scale-100"
		x-transition:leave="ease-out duration-200"
		x-transition:leave-start="opacity-100 scale-100"
		x-transition:leave-end="opacity-0 scale-150"
		x-on:click="imagePreview"
	/>
	<div class="fixed z-50 h-screen flex items-center w-screen p-10 top-0 left-0"
		x-show="previewShow"
		x-transition:enter="ease-out duration-300"
		x-transition:enter-start="opacity-0"
		x-transition:enter-end="opacity-100"
		x-transition:leave="ease-out duration-200"
		x-transition:leave-start="opacity-100"
		x-transition:leave-end="opacity-0"
		x-on:keydown.escape.window="previewClose"
		style="display:none"
	>
		<div class="absolute top-0 left-0 z-0 w-full h-full bg-gray-700 opacity-50"></div>
		<img id="preview-{{ $id }}" src="{{ asset($src) }}"
			class="relative rounded-lg shadow-lg z-10 transform transition-all max-h-full max-w-full mx-auto"
			x-show="previewShow"
			x-transition:enter="ease-out duration-300 delay-100"
			x-transition:enter-start="scale-50 opacity-0"
			x-transition:enter-end="scale-100 opacity-100"
			x-transition:leave="ease-out duration-200"
			x-transition:leave-start="scale-100 opacity-100"
			x-transition:leave-end="scale-0 opacity-0"
			x-on:click.away="previewClose"
		/>
	</div>
</div>
