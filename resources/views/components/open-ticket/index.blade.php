{{-- <div x-data="test()">
	<input type="file" id="image" @change="changeImage">
	<div>
		<img src="" id="imagePreview" alt="">
	</div>
	<input type="file" id="duplicate">
</div> --}}
<div class="mt-2 grid justify-items-stretch" x-data="openTicket()">
	<div class="flex-grow">
		<div class="relative rounded-md shadow-sm">
			<textarea class="form-textarea focus:ring-indigo-500 focus:border-indigo-500 block w-full h-20 px-3 py-2 sm:text-sm border-gray-300 rounded-md" @keyup="problemFilled(this)" x-model="description" placeholder="Describe your problem here"></textarea>
		</div>
		<div class="p-2 flex justify-center" x-show="imageShow"
			x-transition:enter="transition ease-out duration-200"
			x-transition:enter-start="opacity-0 transform scale-50 translate-y-20"
			x-transition:enter-end="opacity-100 transform scale-100"
			x-transition:leave="transition ease-in duration-200"
			x-transition:leave-start="opacity-100 transform scale-100"
			x-transition:leave-end="opacity-0 transform scale-50 translate-y-20"
		>
			<div class="relative overflow-hidden justify-center">
				<img id="imagePreview" class="rounded-md max-w-xs max-h-xs">
				<div role="button" @click="imageReset(this)" class="absolute top-1 right-1 focus:ring-red-500 hover:bg-red-500 p-0 block text-white bg-red-700 p-1 rounded-full w-6 h-6 shadow-sm">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
					</svg>
				</div>
			</div>
		</div>
		<div class="relative rounded-md shadow-sm">
			<input type="file" id="imageInput" @change="imageChange(this)" hidden accept="image/*">
			<input type="button" id="imageButton" role="button" value="Upload screen capture" @click.prevent="this.imageInput.click()" class="focus:ring-gray-500 hover:bg-gray-500 focus:border-gray-500 block w-full px-3 py-2 mt-2 bg-gray-700 text-white sm:text-sm border-gray-900 rounded-md">
		</div>
		<div class="relative rounded-md shadow-sm">
			<button id="submitButton" class="disabled:opacity-50 disabled:bg-indigo-500 focus:ring-indigo-500 hover:bg-indigo-500 focus:border-indigo-500 block w-full px-3 py-2 mt-2 bg-indigo-700 text-white sm:text-sm border-gray-900 rounded-md" disabled
			@click.prevent="modalOpen = true">Kirim</button>
		</div>
	</div>
	<x-open-ticket.modal id="modal" />
</div>
