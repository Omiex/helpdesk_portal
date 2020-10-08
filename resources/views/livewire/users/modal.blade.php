<div wire:loading.remove wire:target="closeModal" class="fixed z-10 inset-0 overflow-y-auto transition-all ease-out duration-400">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75" wire:click="closeModal()"></div>
    </div>
    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-screen" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <form>
	      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
	        <div class="">
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
	        </div>
	      </div>
	      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
	        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
	          <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
	            Close
	          </button>
	        </span>
				</div>
      </form>
    </div>
  </div>
</div>
