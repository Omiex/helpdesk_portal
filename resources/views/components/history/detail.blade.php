@props(['label', 'value'])
<div {{ $attributes->merge(['class' => 'sm:grid grid-cols-2 gap-2']) }}>
	<div class="text-gray-500">{{ $label }}</div>
	<div class="ml-2 sm:ml-0">
		<input class="bg-white w-full" type="text" disabled readonly value="{{ $value }}">
	</div>
</div>
