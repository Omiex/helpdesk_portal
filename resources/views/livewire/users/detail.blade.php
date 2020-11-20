<form>
  <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
    {{-- <div class=""> --}}
      <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
        <input type="text" class="shadow border appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" wire:model="user_name">
      </div>
      <div class="mb-4">
        <label for="nik" class="block text-gray-700 text-sm font-bold mb-2">NIK</label>
				<input type="text" class="shadow border appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nik" wire:model="user_nik">
      </div>
      <div class="mb-4">
        <label for="divisi" class="block text-gray-700 text-sm font-bold mb-2">Divisi</label>
				<input type="text" class="shadow border appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="divisi" wire:model="user_divisi">
      </div>
      <div class="mb-4">
        <label for="jabatan" class="block text-gray-700 text-sm font-bold mb-2">Jabatan</label>
				<input type="text" class="shadow border appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="jabatan" wire:model="user_jabatan">
      </div>
      <div class="mb-4">
        <label for="jabatan" class="block text-gray-700 text-sm font-bold mb-2">Lokasi</label>
				<input type="text" class="shadow border appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="lokasi" wire:model="user_lokasi">
      </div>
      <div class="mb-4">
        <label for="telepon" class="block text-gray-700 text-sm font-bold mb-2">Telepon</label>
				<input type="text" class="shadow border appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="telepon" wire:model="user_telepon">
      </div>
      <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
				<input type="text" class="shadow border appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" wire:model="user_email">
      </div>
      <div class="mb-4">
        <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
				<input type="text" class="shadow border appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="role" wire:model="user_role">
      </div>
    {{-- </div> --}}
  </div>
</form>
