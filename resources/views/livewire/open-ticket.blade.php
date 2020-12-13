<div>
	<x-open-ticket.index />
</div>
@push('scripts')
	<script>
		function openTicket() {
			return {
				image		: this.image,
				imageShow	: false,
				imageName	: '',
				imageButton	: 'Upload screen capture (max 2 MB)',
				sendButton	: 'Kirim',
				sendButtonDisabled : true,
				fileName	: '',

				modalOpen	: false,
				nik			: '{{ Auth::user()->nik }}',
				user_id		: '{{ Auth::user()->id }}',
				name		: '{{ Auth::user()->name }}',
				telepon		: '{{ Auth::user()->telepon }}',
				email		: '{{ Auth::user()->email }}',
				divisi		: '{{ Auth::user()->divisi }}',
				lokasi		: '{{ Auth::user()->lokasi }}',
				ip_address	: '{{ Request::ip() }}',
				description	: '',
				sending		: false,

				alertShow	: false,
				alertMessage: null,
				alertType	: null,
				alertColor	: null,
				alertTimeout: null,

				imageChange: function() {
					if (this.image.value) {
						let reader = new FileReader()
						reader.readAsDataURL(event.target.files[0])
						// this.file = event.target.files
						reader.onload = async () => {
							await (this.imageName = reader.result)
							this.imageShow = true
						}
					} else {
						this.imageShow = false
						setTimeout(() => {
							this.imageName = ''
						}, 200)
					}

					this.imageButton = this.image.value
						? 'Ganti Gambar (max 2 MB)'
						: 'Upload screen capture (max 2 MB)'
				},

				imageReset: function() {
					this.image.value = null
					this.imageChange()
				},

				problemChange: function() {
					if (this.description != '') {
						this.sendButtonDisabled = false
					} else {
						this.sendButtonDisabled = true
					}
				},

				resetValues: function() {
					this.image.value = null
					this.description = ''
					this.imageChange()
					this.problemChange()
				},

				store: async function() {
					this.sending = true
					let imageStore = new Promise((resolve, reject) => {
						let file = this.image.files[0]
						if (file) {
							@this.upload('image', file, function(fileName) {
								resolve(fileName)
							})
						} else {
							resolve('')
						}
					})
					await imageStore
					@this.description = this.description
					@this.ip_address = this.ip_address

					let status = await @this.store()
					this.modalOpen = false
					setTimeout(() => {
						this.sending = false
					}, 200)

					if (status) {
						this.alert(status, 'success')
						this.resetValues()
					} else {
						@this.image = null
						status = 'Ukuran maksimum gambar yang dapat diupload adalah 2 MB, mohon periksa kembali'
						this.alert(status, 'warning')
					}
				},

				alert: function(message, type = null) {
					clearTimeout(this.alertTimeout)
					this.alertMessage = message
					this.alertType = type
					this.alertColorSet()
					this.alertShow = true
					this.alertTimeout = setTimeout(() => { this.alertReset() }, 10000)
				},

				alertColorSet: function() {
					switch (this.alertType) {
						case 'success':
							this.alertColor = 'green';
							break;
						case 'warning':
							this.alertColor = 'yellow';
							break;
						case 'danger':
							this.alertColor = 'red';
							break;
						default:
							this.alertColor = 'blue';
							break;
					}
				},

				alertReset: function() {
					this.alertShow	 = false
					setTimeout(() => {
						this.alertMessage= null
						this.alertType	 = null
						this.alertColor	 = null
					}, 300)
				}
			}
		}
	</script>
@endpush
