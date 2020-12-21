<div>
	@foreach ($this->problems as $problem)
		<div wire:key="{{ $problem->id }}" x-data="history()">
			<div class="flex flex-col mb-4 md:mb-0 overflow-hidden" x-bind:class="{rounded: detailShow}">
				<div class="order-2 md:ml-8 mb-5 px-2 border-t border-b py-4" style="display:none"
					x-show="detailShow"
					x-transition:enter="transition ease-out duration-200"
					x-transition:enter-start="opacity-0 transform origin-top -translate-y-20"
					x-transition:enter-end="opacity-100 transform origin-top translate-y-0"
					x-transition:leave="transition ease-out duration-100"
					x-transition:leave-start="opacity-100 transform origin-top translate-y-0"
					x-transition:leave-end="opacity-0 transform origin-top -translate-y-20"
				>
					<div class="flex flex-col items-end sm:flex-row mb-2">
						<div class="mx-auto w-40 max-w-full sm:mx-0 p-2">
							<img class="rounded shadow" src="{{ asset($problem->image_path) }}" alt="">
						</div>
						<div class="w-full max-w-md">
							<x-history.detail label="IP Address" :value="$problem->ip_address" />
							<x-history.detail label="Telepon" :value="$problem->user->telepon" />
							<x-history.detail label="Email" :value="$problem->user->email" />
							<x-history.detail label="Lokasi" :value="$problem->user->lokasi" />
						</div>
					</div>
					<div class="overflow-x-auto shadow-md rounded-md">
						<table class="table-auto w-full">
							<thead>
								<tr>
									<x-history.th>#</x-history.th>
									<x-history.th>Time</x-history.th>
									<x-history.th>Process</x-history.th>
									<x-history.th>Proceed by</x-history.th>
									<x-history.th>Description</x-history.th>
								</tr>
							</thead>
							@foreach ($problem->progress as $progress)
								<tr @if ($loop->odd) class="bg-gray-100" @endif>
									<td class="px-2 py-1 align-top">{{ $loop->iteration }}</td>
									<td class="px-2 py-1 align-top">{{ $progress->created_at }}</td>
									<td class="px-2 py-1 align-top">{{ $progress->process }}</td>
									<td class="px-2 py-1 align-top">{{ $progress->proceed_by->name }}</td>
									<td class="px-2 py-1 align-top">{{ $progress->description }}</td>
								</tr>
							@endforeach
						</table>
						@if ($problem->progress->count() < 1)
							<div class="text-center py-2">
								Belum ada progres
							</div>
						@endif
					</div>
				</div>
				<div class="order-1 z-10 bg-white md:flex" role="button" x-on:click="detailShow = !detailShow">
					<div class="px-2 py-1 w-10">
						{{ $loop->index + $this->problems->firstItem() }}
					</div>
					<div class="px-2 py-1">
						{{ $problem->created_at }}
					</div>
					<div class="px-2 py-1 md:w-28 font-bold md:font-normal text-xl md:text-base">
						{{ $problem->ticket_number }}
					</div>
					<div class="px-2 pt-1 md:py-1 md:flex-1">
						<div class="inline-block mr-4">
							{{ $problem->user->name }}
						</div>
						<div class="inline-block text-gray-500 mr-4">
							{{ $problem->user->nik }}
						</div>
						<div class="block md:inline-block text-gray-500">
							{{ $problem->user->divisi }}
						</div>
					</div>
					<div class="px-2 py-1 md:flex-1">
						{{ $problem->description }}
					</div>
				</div>
			</div>
		</div>
	@endforeach
	{{ $this->problems->links() }}
</div>

@push('scripts')
	<script>
		function history() {
			return {
				detailShow : false
			}
		}
	</script>
@endpush
