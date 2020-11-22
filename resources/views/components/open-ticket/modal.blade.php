@props(['id'])
<x-modal id="{{ $id }}">
	<form action="#" method="POST">
		<div class="shadow overflow-hidden sm:rounded-lg">
			<div class="px-4 py-5 bg-white sm:p-6">
				<h1 class="mb-6 text-lg">Data berikut akan dikirimkan ke tim IT</h1>
				<div class="grid grid-cols-6 gap-6">
					<div class="col-span-6 sm:col-span-3">
						<label for="user_id" class="block text-sm font-medium text-gray-700">ID User</label>
						<input type="text" id="user_id" value="user_id" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
					</div>

					<div class="col-span-6 sm:col-span-3">
						<label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
						<input type="text" id="name" value="name" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
					</div>

					<div class="col-span-6 sm:col-span-3">
						<label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
						<input type="text" id="telepon" value="telepon" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
					</div>

					<div class="col-span-6 sm:col-span-3">
						<label for="email" class="block text-sm font-medium text-gray-700">Email</label>
						<input type="text" id="email" value="email" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
					</div>

					<div class="col-span-6 sm:col-span-3">
						<label for="divisi" class="block text-sm font-medium text-gray-700">Divisi</label>
						<input type="text" id="divisi" value="divisi" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
					</div>

					<div class="col-span-6 sm:col-span-3">
						<label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
						<input type="text" id="lokasi" value="lokasi" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
					</div>

					<div class="col-span-6 sm:col-span-3">
						<label for="problem" class="block text-sm font-medium text-gray-700">Problem</label>
						<textarea id="problem" class="form-textarea mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md max-h-40"></textarea>
					</div>
				</div>
			</div>
			<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
				<div role="button" @click="isOpen = false" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
					Batalkan
				</div>
				<button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
					Kirim
				</button>
			</div>
		</div>
	</form>
</x-modal>
