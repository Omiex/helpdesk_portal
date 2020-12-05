@props([
	'color' => 'gray',
	'scope' => 'col'
])
@php
	$class = $scope == 'col'
		? 'px-2 py-1 bg-'.$color.'-700 text-white text-left sticky top-0 truncate'
		: 'p-2 align-top'
@endphp

<th {{ $attributes->merge(['class' => $class]) }}>
	{{ $slot }}
</th>
