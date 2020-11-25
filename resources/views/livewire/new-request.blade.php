<div class="flex items-center">
	<svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
		<path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
		</path>
	</svg>
	<div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
		@if ($problems->count() > 0)
			New Requests
			<span class="relative bottom-2 inline-block px-2 text-xs bg-red-700 text-white rounded-full">
				{{ $problems->count() }}
			</span>
		@else
			New Request
		@endif
	</div>
</div>

<div class="ml-12 mt-2 overflow-hidden rounded-md shadow-md bg-white">
	<div class="text-sm text-gray-500 max-h-40 overflow-auto">
		<table class="table table-auto w-full">
			<thead>
				<tr class="">
					<th class="bg-indigo-700 text-white sticky top-0">#</th>
					<th class="bg-indigo-700 text-white sticky top-0 text-left">Name</th>
					<th class="bg-indigo-700 text-white sticky top-0 text-left">Division</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($problems as $problem)
					<tr>
						<th>{{ $loop->iteration }}</th>
						<td>{{ $problem->user->name }}</td>
						<td>{{ $problem->user->divisi }}</td>
					</tr>
					@php
						$newRequest = $loop->count
					@endphp
				@endforeach
			</tbody>
		</table>
		@if ($problems->count() <= 0)
			<div class="p-2 text-center">
				Tidak ada data
			</div>
		@endif
	</div>
</div>
