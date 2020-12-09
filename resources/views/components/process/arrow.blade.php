<svg class="w-4 inline"
	x-show="!show"
	x-transition:enter="transition ease-out duration-200"
	x-transition:enter-start="transform rotate-90"
	x-transition:enter-end="transform rotate-0"
	xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
>
	<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
</svg>
<svg class="w-4 inline"
	x-show="show"
	x-transition:enter="transition ease-out duration-200"
	x-transition:enter-start="transform -rotate-90"
	x-transition:enter-end="transform rotate-0"
	style="display: none"
	xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
>
	<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
</svg>
