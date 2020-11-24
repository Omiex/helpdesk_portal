@props(['id'])
<x-modal id="{{ $id }}">
	<form x-on:submit.prevent="store">
		<div class="shadow overflow-hidden sm:rounded-lg" @click.away="location.reload()">
			<div class="px-4 py-5 bg-white sm:p-6">
				@if (session()->has('message'))
					<div class="flex">
						<div class="flex-1">
							{{ session('message') }}
						</div>
					</div>
				@else
					<h1 class="mb-6 text-lg">Data berikut akan dikirimkan ke tim IT</h1>
					<div class="grid grid-cols-6 gap-6">
						<div class="col-span-6 sm:col-span-3">
							<label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
							<input readonly disabled type="text" id="nik" x-model="nik" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
						</div>

						<div class="col-span-6 sm:col-span-3">
							<label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
							<input readonly disabled type="text" id="name" x-model="name" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
						</div>

						<div class="col-span-6 sm:col-span-3">
							<label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
							<input readonly disabled type="text" id="telepon" x-model="telepon" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
						</div>

						<div class="col-span-6 sm:col-span-3">
							<label for="email" class="block text-sm font-medium text-gray-700">Email</label>
							<input readonly disabled type="text" id="email" x-model="email" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
						</div>

						<div class="col-span-6 sm:col-span-3">
							<label for="divisi" class="block text-sm font-medium text-gray-700">Divisi</label>
							<input readonly disabled type="text" id="divisi" x-model="divisi" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
						</div>

						<div class="col-span-6 sm:col-span-3">
							<label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
							<input readonly disabled type="text" id="lokasi" x-model="lokasi" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
						</div>

						<div class="col-span-6 sm:col-span-3">
							<label for="problem" class="block text-sm font-medium text-gray-700">Problem</label>
							<textarea readonly disabled id="problem" x-model="description" class="form-textarea mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md max-h-40"></textarea>
						</div>

						<div class="col-span-6 sm:col-span-3">
							<label for="problem" class="block text-sm font-medium text-gray-700">Screen Capture</label>
							<img id="modalImagePreview" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block max-w-full sm:text-sm border-gray-300 rounded-md max-h-40"/>
						</div>
					</div>
				@endif
			</div>
			<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
				@if (session()->has('message'))
					<div role="button" onclick="location.reload()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						OK
					</div>
				@else
					<div role="button" x-on:click="modalOpen = false" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
						Batalkan
					</div>
					<button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						Kirim
					</button>
				@endif
			</div>
		</div>
	</form>
</x-modal>
