@props([
	'color' => 'gray',
	'scope' => 'col'
])
@php
	$class = $scope == 'col'
		? 'p-2 text-left sticky top-0 truncate z-20 bg-'.$color.'-700 text-white'
		: 'p-2 text-center sticky left-0 align-top z-10 bg-white'
@endphp

<th {{ $attributes->merge(['class' => $class]) }}>
	{{ $slot }}
</th>
