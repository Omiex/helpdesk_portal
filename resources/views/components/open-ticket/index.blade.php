<div class="mt-2 grid justify-items-stretch" x-data="ot()">
	<div class="p-2 justify-self-center">
		<div class="relative"
			x-show="open"
			x-transition:enter="transition ease-out duration-200"
			x-transition:enter-start="opacity-0 transform scale-50 translate-y-20"
			x-transition:enter-end="opacity-100 transform scale-100"
			x-transition:leave="transition ease-in duration-200"
			x-transition:leave-start="opacity-100 transform scale-100"
			x-transition:leave-end="opacity-0 transform scale-50 translate-y-20"
		>
			<img id="ot_imagePreview" class="rounded-md max-w-xs max-h-xs">
			<div id="ot_fileReset" role="button" x-spread="imageReset" class="absolute top-1 right-1 focus:ring-red-500 hover:bg-red-500 p-0 block text-white bg-red-700 p-1 rounded-full w-6 h-6 shadow-sm">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
				</svg>
			</div>
		</div>
	</div>
	<div class="flex-grow">
		<div class="relative rounded-md shadow-sm">
			<textarea class="form-textarea focus:ring-indigo-500 focus:border-indigo-500 block w-full h-20 px-3 py-2 sm:text-sm border-gray-300 rounded-md" x-spread="problemFilled" placeholder="Describe your problem here"></textarea>
		</div>
		<div class="relative rounded-md shadow-sm">
			<input type="file" id="ot_file" x-spread="image" x-spread="problemFilled" hidden accept="image/*">
			<input type="button" id="ot_fileButton" role="button" value="Upload screen capture" onclick="document.querySelector('#ot_file').click()" class="focus:ring-gray-500 hover:bg-gray-500 focus:border-gray-500 block w-full px-3 py-2 mt-2 bg-gray-700 text-white sm:text-sm border-gray-900 rounded-md">
		</div>
		<div class="relative rounded-md shadow-sm">
			<button id="ot_submit" class="disabled:opacity-50 disabled:bg-indigo-500 focus:ring-indigo-500 hover:bg-indigo-500 focus:border-indigo-500 block w-full px-3 py-2 mt-2 bg-indigo-700 text-white sm:text-sm border-gray-900 rounded-md" disabled @click="isOpen = true">Kirim</button>
		</div>
	</div>
	<x-open-ticket.modal id="ot_modal" />
</div>

@push('scripts')
<script>
	function ot() {
		var file = document.querySelector('#ot_file')
		var output = document.querySelector('#ot_imagePreview')
		var button = document.querySelector('#ot_fileButton')
		var submitButton = document.querySelector('#ot_submit')

		return {
			open: false,
			isOpen: false,
			imageReset: {
				['@click']() {
					this.open = false
					setTimeout(() => {
						output.src = 'https://via.placeholder.com/150.png?text=Screen+capture'
						file.value = null
						button.value = "Upload screen capture"
					}, 200)
				}
			},
			image: {
				['@change']() {
					var reader = new FileReader()

					reader.onload = function() {
						output.src = reader.result
					}

					reader.readAsDataURL(event.target.files[0])
					button.value = "Ganti gambar"
					setTimeout(() => { this.open = true }, 200)
				}
			},
			problemFilled: {
				['@keyup']() {
					if (event.target.value != '') {
						submitButton.disabled = false
					} else {
						submitButton.disabled = true
					}
				}
			}
		}
	}
</script>
@endpush
