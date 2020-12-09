@props(['color' => 'blue'])
<button {{ $attributes->merge(['type' => 'button', 'class' => 'bg-'.$color.'-200 hover:bg-'.$color.'-300 text-xs px-2 rounded shadow truncate transition duration-100 transform origin-right hover:scale-125']) }}>
	{{ $slot }}
</button>
