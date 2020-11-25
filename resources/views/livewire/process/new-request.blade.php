<div x-data="{ show: false }" role="button">
	<h1 @click="show = !show">
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
			xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
		>
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
		</svg>
		@if ($problems->count() > 0)
			New Requests
			<span class="text-sm bg-red-700 text-white rounded-full px-2">
				{{ $problems->count() }}
			</span>
		@else
			New Requests
		@endif
	</h1>
	<div class="rounded-lg overflow-hidden shadow-md" x-show="show"
		x-transition:enter="transition ease-out duration-200"
		x-transition:enter-start="opacity-0 transform scale-y-0 origin-top"
		x-transition:enter-end="opacity-100 transform scale-y-100 origin-top"
		x-transition:leave="transition ease-out duration-200"
		x-transition:leave-start="opacity-100 transform scale-y-100 origin-top"
		x-transition:leave-end="opacity-0 transform scale-y-90 origin-top"
	>
		<div class="max-h-80 overflow-auto">
			<table class="table-auto w-full">
				<thead>
					<tr class="text-left">
						<th class="px-2 py-1 bg-orange-700 text-white sticky top-0 text-center">#</th>
						<th class="px-2 py-1 bg-orange-700 text-white sticky top-0">Time</th>
						<th class="px-2 py-1 bg-orange-700 text-white sticky top-0">Name</th>
						<th class="px-2 py-1 bg-orange-700 text-white sticky top-0">ID</th>
						<th class="px-2 py-1 bg-orange-700 text-white sticky top-0">IP Address</th>
						<th class="px-2 py-1 bg-orange-700 text-white sticky top-0">Division</th>
						<th class="px-2 py-1 bg-orange-700 text-white sticky top-0">Location</th>
						<th class="px-2 py-1 bg-orange-700 text-white sticky top-0">Email</th>
						<th class="px-2 py-1 bg-orange-700 text-white sticky top-0">Phone</th>
						<th class="px-2 py-1 bg-orange-700 text-white sticky top-0">Description</th>
						<th class="px-2 py-1 bg-orange-700 text-white sticky top-0">Capture</th>
						<th class="px-2 py-1 bg-orange-700 text-white sticky top-0">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($problems as $problem)
						<tr>
							<th class="p-2 align-top">{{ $loop->iteration }}</th>
							<td class="p-2 align-top">{{ $problem->created_at }}</td>
							<td class="p-2 align-top">{{ $problem->user->name }}</td>
							<td class="p-2 align-top">{{ $problem->user->nik }}</td>
							<td class="p-2 align-top">{{ $problem->ip_address }}</td>
							<td class="p-2 align-top">{{ $problem->user->divisi }}</td>
							<td class="p-2 align-top">{{ $problem->user->lokasi }}</td>
							<td class="p-2 align-top">{{ $problem->user->email }}</td>
							<td class="p-2 align-top">{{ $problem->user->telepon }}</td>
							<td class="p-2 align-top">{{ $problem->description }}</td>
							<td class="p-2 align-top">{{ $problem->image_path }}</td>
							<td class="p-2 align-top">
								<button type="button" class="bg-blue-200 hover:bg-blue-300 text-xs px-2 rounded shadow">
									Process
								</button>
								<button type="button" class="bg-orange-200 hover:bg-orange-300 text-xs px-2 rounded shadow">
									Decline
								</button>
							</td>
						</tr>
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
</div>
