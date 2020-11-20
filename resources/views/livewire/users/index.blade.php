<div>

	@if (session('success'))
		<x-alert type="success">
			{{ session('success') }}
		</x-alert>
	@endif

	{{-- filter --}}
	<div class="flex flex-wrap">

		{{-- limit --}}
		<div class="w-full sm:w-1/2 mb-1">
			<label class="text-gray-700 mb-1" for="limit">
				Data perhalaman:
			</label>
			<div class="inline-block relative">
				<select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-2 py-1 pr-6 rounded focus:outline-none focus:shadow-outline"
					id="limit"
					wire:model="limit"
				>
					<option>10</option>
					<option>20</option>
					<option>50</option>
				</select>
				<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
					<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
				</div>
			</div>
		</div>
		{{-- end limit --}}

		{{-- search --}}
		<div class="w-full sm:w-1/2 mb-1 sm:text-right">
			<div class="inline-block relative text-gray-700 mb-1">
				<div class="inline-block">
					<input class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-2 py-1 pr-8 rounded focus:outline-none focus:shadow-outline"
						type="text"
						id="search"
						placeholder="Cari ..."
						wire:model="search"
					>
				</div>

				{{-- icons --}}
				<div class="pointer-event-none absolute inset-y-0 right-0 flex items-center px-1 text-gray-100 hover:text-white bg-gray-500 hover:bg-gray-400 rounded m-1" role="button" wire:click="$set('search', '')">

					@if ($search == '')

						{{-- loop --}}
						<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
							wire:loading.remove
							wire:target="search"
						>
						  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
						</svg>
						{{-- end loop --}}

					@else

						{{-- clear --}}
						<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
							wire:loading.remove
							wire:target="search"
						>
							<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
						</svg>
						{{-- end clear --}}

					@endif

					{{-- loading --}}
					<svg wire:loading wire:target="search" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="none">
		        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
		        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
		      </svg>
					{{-- end loading --}}

				</div>
				{{-- end icons --}}

			</div>
		</div>
		{{-- end search --}}

	</div>
	{{-- end filter --}}

	<div class="overflow-auto shadow">
		@if (count($users) <= 0)
			<div class="relative bg-yellow-100 border-t-4 border-yellow-500 rounded-b text-yellow-900 px-4 py-3" role="alert">
				<p class="text-sm text-center">Data tidak ditemukan</p>
			</div>
		@else
			<table class="table-auto w-full">
				<thead>
					<tr class="text-left bg-red-800 text-white">
						<th class="px-4 py-2 text-center">#</th>
						<th class="px-4 py-2">NIK</th>
						<th class="px-4 py-2">Nama</th>
						<th class="px-4 py-2">Divisi</th>
						<th class="px-4 py-2">Jabatan</th>
						<th class="px-4 py-2">Role</th>
						<th class="px-4 py-2 text-center select-none">Action</th>
					</tr>
				</thead>
				<tbody wire:loading.class="animate-pulse" wire:target="limit" class="border-b">
					@foreach($users as $user)
						<tr @if($loop->iteration % 2 == 1) class="bg-gray-100" @endif>
							<td class="text-center px-4 py-2">{{ $users->firstItem() + $loop->index }}</td>
							<td class="px-4 py-2">{{ $user->nik }}</td>
							<td class="px-4 py-2">{{ $user->name }}</td>
							<td class="px-4 py-2">{{ $user->divisi }}</td>
							<td class="px-4 py-2">{{ $user->jabatan }}</td>

							{{-- role --}}
							<td class="px-4 py-1" wire:loading.class="animate-pulse" wire:target="changeRole">
								<div class="flex items-center space-x-1">

									<div
										role="button" wire:click="changeRole({{ $user->id }})"
										class="rounded-full text-white p-1
										@if ($user->role == 'user') bg-teal-500 hover:bg-teal-400
										@elseif ($user->role == 'staff') bg-yellow-500 hover:bg-yellow-400
										@else bg-gray-300 @endif
										"
									>
										<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
											<path d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z" />
										</svg>
									</div>

									<div class="text-sm">
										{{ Str::ucfirst($user->role) }}
									</div>

								</div>
							</td>
							{{-- end role --}}

							{{-- actions --}}
							<td class="text-center p-1 pb-0 select-none whitespace-no-wrap">

								{{-- button detail --}}
								<button class="bg-blue-500 hover:bg-blue-400 text-white text-xs whitespace-no-wrap mb-1 py-1 px-3 focus:outline-none focus:shadow-outline rounded"
									type="button"
									name="Detail-{{ $user->nik }}"
									wire:click="detail({{ $user->id }})"
								>
									<svg class="inline sm:hidden h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
										<path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
									</svg>
									<span class="hidden sm:inline">Detail</span>
								</button>
								{{-- end button detail --}}

								{{-- button delete --}}
								@if ($user->role != 'admin')
									<button class="bg-red-500 hover:bg-red-400 text-white text-xs whitespace-no-wrap mb-1 py-1 px-3 focus:outline-none focus:shadow-outline rounded"
										type="button"
										name="hapus-{{ $user->nik }}"
										wire:click="delete({{ $user->id }})"
									>
										<svg class="inline sm:hidden h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
											<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
										</svg>
										<span class="hidden sm:inline">Hapus</span>
									</button>
								@endif
								{{-- end button delete --}}

							</td>
							{{-- end actions --}}

						</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>

	<div class="mt-2 select-none">
		{{ $users->links() }}
	</div>

	{{-- @include('livewire.users.loading') --}}

	<div wire:model="isOpen" class="fixed z-10 inset-0 overflow-y-auto transition-all ease-out duration-400"
		x-data="{ show: @entangle('isOpen') }"
		x-show="show"
		x-on:close.stop="show = false"
		x-on:keydown.escape.window="show = false"
		style="display: none;"
	>
	  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
			x-show="show"
			{{-- x-on:click="show = false" --}}
			x-transition:enter="ease-out duration-300"
			x-transition:enter-start="opacity-0"
			x-transition:enter-end="opacity-100"
			x-transition:leave="ease-in duration-200"
			x-transition:leave-start="opacity-100"
			x-transition:leave-end="opacity-0"
		>
	    <div class="fixed inset-0 transition-opacity" x-on:click="show = false">
	      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
	    </div>
	    <!-- This element is to trick the browser into centering the modal contents. -->
	    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform my-8 align-middle max-w-lg w-screen" role="dialog" aria-modal="true" aria-labelledby="modal-headline"
				x-show="show"
				x-transition:enter="ease-out duration-300"
				x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
				x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
				x-transition:leave="ease-in duration-200"
				x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
				x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
			>
				@include('livewire.users.detail')
				<div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
					<span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
						<button x-on:click="show = false" wire:click="closeModal" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
							Close
						</button>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
