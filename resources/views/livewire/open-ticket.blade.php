<div>
	<x-open-ticket.index />
</div>
@push('scripts')
	<script>
		function openTicket() {
			return {
				imageShow: false,
				modalOpen: false,

				nik: '{{ Auth::user()->nik }}',
				user_id: '{{ Auth::user()->id }}',
				name: '{{ Auth::user()->name }}',
				telepon: '{{ Auth::user()->telepon }}',
				email: '{{ Auth::user()->email }}',
				divisi: '{{ Auth::user()->divisi }}',
				lokasi: '{{ Auth::user()->lokasi }}',
				ip_address: '{{ Request::ip() }}',
				description: '',
				fileName: '',

				imageChange: function(el) {
					let reader = new FileReader()

					reader.onload = () => {
						el.imagePreview.src = reader.result
						el.modalImagePreview.src = reader.result
						this.imageShow = true
					}

					reader.readAsDataURL(event.target.files[0])
					el.imageButton.value = "Ganti gambar"
				},

				imageReset: function(el) {
					this.imageShow = false
					setTimeout(() => {
						el.imagePreview.src = ''
						el.modalImagePreview = ''
						el.imageInput.value = null
						el.imageButton.value = "Upload screen capture"
					}, 200)
				},

				problemFilled: function(el) {
					if (event.target.value != '') {
						el.submitButton.disabled = false
					} else {
						el.submitButton.disabled = true
					}
				},

				bersihkan: function() {
					console.log('session')
					this.imageShow = false
					this.modalOpen = false
					this.description = ''
					sessionStorage.clear()
				},

				imageStore: function() {
					let file = document.querySelector('#imageInput').files[0]

					@this.upload('image', file, (uploadedFilename) => {
						this.fileName = uploadedFilename
						return true
					}, () => {
						console.log("upload foto error")
						return false
					}, (event) => {
						// event.detail.progress
					})
				},

				store: async function() {
					await this.imageStore()

					@this.description = this.description
					@this.ip_address = this.ip_address
					@this.image_path = this.fileName

					@this.store()
				},
			}
		}
	</script>
@endpush
