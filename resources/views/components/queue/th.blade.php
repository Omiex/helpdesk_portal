@props(['scope' => 'col'])
@php
	$class = $scope == 'col'
		? 'bg-indigo-700 text-white sticky top-0 px-1 text-left'
		: 'align-top px-1'
@endphp
<th {{ $attributes->merge(['class' => $class]) }}>
	{{ $slot }}
</th>
