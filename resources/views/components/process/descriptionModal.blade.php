<x-modal id="descriptionModal" clear="clear()">
	<form x-on:submit.prevent="simpan">
		<div class="px-4 py-5 bg-white sm:p-6">
			<h1 class="mb-6 text-lg">Berikan Remark</h1>
			<div class="block text-sm font-medium text-gray-700">Berikan informasi kepada user dan staff IT yang lain tentang progress tiket <b x-text="ticket_number"></b>
			</div>
			<input type="text" x-model="desc" class="form-textarea mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md max-h-40" />
		</div>

		<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
			<div role="button" x-on:click="clear" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
				Batalkan
			</div>
			<button type="submit"
				wire:loading.class="bg-gray-600 hover:bg-gray-600"
				wire:loading.class.remove="bg-indigo-600 hover:bg-indigo-700"
				wire:loading.attr="disabled"
				wire:target="create"
				class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
			>
				<span wire:loading wire:target="create">Saving...</span>
				<span wire:loading.remove wire:target="create">Kirim</span>
			</button>
		</div>
	</form>
</x-modal>
