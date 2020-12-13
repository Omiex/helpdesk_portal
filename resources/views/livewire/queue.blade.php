<div class="">
	<div class="flex items-center">
		<svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
			<path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
			</path>
		</svg>
		<div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
			@if ($this->problems->count() < 2)
				{{ Str::title($type) }}
			@else
				{{ Str::plural(Str::title($type)) }}
			@endif
			@if ($this->problems->count() > 0)
				<span class="relative bottom-2 px-2 py-1 text-xs bg-red-700 text-white rounded-full">
					@if ($this->problems->count() > 9)
						9+
					@else
						{{ $this->problems->count() }}
					@endif
				</span>
			@endif
		</div>
	</div>

	<div class="ml-12 mt-2 overflow-hidden rounded-md shadow-md bg-white">
		<div class="text-sm text-gray-500 max-h-40 overflow-auto">
			<table class="table table-auto w-full">
				<thead>
					<tr class="">
						<x-queue.th class="text-center">#</x-queue.th>
						<x-queue.th>Name</x-queue.th>
						<x-queue.th>Division</x-queue.th>
						@if ($type == "on progress")
							<x-queue.th>Proceed by</x-queue.th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach ($this->problems as $p)
						@php
						$problem = $p;
						if ($type == "on progress") {
							$problem = $p->problem;
						}
						@endphp
						<tr wire:key="{{ $p->id }}">
							<x-queue.th scope="row">{{ $loop->iteration }}</x-queue.th>
							<x-queue.td>{{ $problem->user->name }}</x-queue.td>
							<x-queue.td>{{ $problem->user->divisi }}</x-queue.td>
							@if ($type == "on progress")
								<x-queue.td>{{ $p->proceed_by->name }}</x-queue.td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
			@if ($this->problems->count() <= 0)
				<div class="p-2 text-center">
					Tidak ada data
				</div>
			@endif
		</div>
	</div>
</div>
