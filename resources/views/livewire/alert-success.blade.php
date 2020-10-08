@if (session('success'))
	<div class="relative bg-green-100 border-l-4 border-green-500 rounded-r text-green-900 mb-4 px-4 py-3 shadow" role="alert">
		<div class="flex items-center">
			<div class="py-1">
				<svg class="stroke-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="2 2 20 20">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
				</svg>
			</div>
			<div>
				<p class="text-sm">{{ session('success') }}</p>
			</div>
		</div>
		<div class="absolute top-0 bottom-0 right-0 px-2 py-2">
			<svg onclick="this.parentNode.parentNode.hidden = true" class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
		</div>
	</div>
@endif
