<div x-data="table()">
	<h1 @click="show = !show" role="button">
		<x-process.arrow />
		@if ($problems->count() < 2)
			{{ Str::title($type) }}
		@else
			{{ Str::plural(Str::title($type)) }}
		@endif
		@if ($problems->count() > 0)
			<span class="text-sm bg-red-700 text-white rounded-full px-2">
				{{ $problems->count() }}
			</span>
		@endif
	</h1>
	<div class="rounded-lg overflow-hidden shadow-md" x-show="show"
		x-transition:enter="transition ease-out duration-200"
		x-transition:enter-start="opacity-0 transform scale-y-0 origin-top"
		x-transition:enter-end="opacity-100 transform scale-y-100 origin-top"
		x-transition:leave="transition ease-out duration-200"
		x-transition:leave-start="opacity-100 transform scale-y-100 origin-top"
		x-transition:leave-end="opacity-0 transform scale-y-90 origin-top"
		style="display: none"
	>
		<div class="max-h-96 overflow-auto">
			<table class="table-auto w-full">
				<thead>
					<tr>
						<x-process.th class="sticky left-0 z-30 text-center">#</x-process.th>
						<x-process.th class="sticky left-0 z-30 text-center">Ticket #</x-process.th>
						<x-process.th>Time</x-process.th>
						<x-process.th>Name</x-process.th>
						<x-process.th>ID</x-process.th>
						<x-process.th>IP Address</x-process.th>
						<x-process.th>Division</x-process.th>
						<x-process.th>Location</x-process.th>
						<x-process.th>Email</x-process.th>
						<x-process.th>Phone</x-process.th>
						<x-process.th>Description</x-process.th>
						@if ($type == 'take over')
							<x-process.th>Proceed by</x-process.th>
							<x-process.th>Remark</x-process.th>
						@endif
						<x-process.th>Capture</x-process.th>
						<x-process.th>Action</x-process.th>
					</tr>
				</thead>
				<tbody>
					@foreach ($problems as $p)
						@php
							$problem = $p;
							if(isset($p->problem)) {
								$problem = $p->problem;
							}
						@endphp
						<tr wire:key="{{ $p->id }}">
							<x-process.th scope="row">{{ $loop->iteration }}</x-process.th>
							<x-process.th scope="row">{{ $problem->ticket_number }}</x-process.th>
							<x-process.td>{{ $problem->created_at }}</x-process.td>
							<x-process.td>{{ $problem->user->name }}</x-process.td>
							<x-process.td>{{ $problem->user->nik }}</x-process.td>
							<x-process.td>{{ $problem->ip_address }}</x-process.td>
							<x-process.td>{{ $problem->user->divisi }}</x-process.td>
							<x-process.td>{{ $problem->user->lokasi }}</x-process.td>
							<x-process.td>{{ $problem->user->email }}</x-process.td>
							<x-process.td>{{ $problem->user->telepon }}</x-process.td>
							<x-process.td>{{ $problem->description }}</x-process.td>
							@if ($type == 'take over')
								<x-process.td>{{ $p->proceed_by->name }}</x-process.td>
								<x-process.td>{{ $p->description }}</x-process.td>
							@endif
							<x-process.td>{{ $problem->image_path }}</x-process.td>
							<x-process.td class="text-right">
								@if ($type != 'on progress')
									<x-process.button x-on:click="progress({{ $problem->id }})">
										Process
									</x-process.button>
								@endif
								@if ($type == 'new request')
									<x-process.button x-on:click="prompt('declined', {{ $problem->id }}, '{{ $problem->ticket_number }}')" color="red">
										Decline
									</x-process.button>
								@endif
								@if ($type == 'on progress')
									<x-process.button x-on:click="prompt('finish', {{ $problem->id }}, '{{ $problem->ticket_number }}')">
										Finish
									</x-process.button>
									<x-process.button x-on:click="prompt('take over', {{ $problem->id }}, '{{ $problem->ticket_number }}')" color="orange">
										Take Over
									</x-process.button>
								@endif
							</x-process.td>
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
	@include('components.process.descriptionModal')
	<x-alert>
		<span x-text="alertMessage"></span>
	</x-alert>
</div>
