<div>
	<div>
		@include('components.process.table', [
			'problems' => $newRequest,
			'type' => 'new request'
		])
	</div>
	<div class="mt-6">
		@include('components.process.table', [
			'problems' => $onProgress,
			'type' => 'on progress'
		])
	</div>
	<div class="mt-6">
		@include('components.process.table', [
			'problems' => $takeOver,
			'type' => 'take over'
		])
	</div>
</div>
<script>
	var ticketSyncInterval = null

	function ticketSync() {
		window.clearInterval(ticketSyncInterval)
		ticketSyncInterval = window.setInterval(function(){
			Livewire.emit('processRefresh')
		}, 3000)
	}

	function ticketTable() {
		return {
			show		: false,
			modalOpen	: false,
			action		: null,
			id			: null,
			ticket_number : null,
			desc		: null,

			sending		: false,

			alertShow	: false,
			alertMessage: null,
			alertType	: null,
			alertColor	: 'green',
			alertTimeout: null,

			prompt: function(action, id, ticket_number) {
				this.action = action
				this.id = id
				this.ticket_number = ticket_number
				this.modalOpen = true
			},

			clear: function() {
				this.modalOpen = false
				setTimeout(() => {
					this.action = ''
					this.id = ''
					this.ticket_number = ''
					this.desc = ''
					this.sending = false
				}, 300)
			},

			progress: async function(id) {
				let message = await @this.create('on progress', id)
				this.alert(message)
			},

			simpan: async function() {
				this.sending = true
				let message = await @this.create(this.action, this.id, this.desc)
				this.clear()
				setTimeout(() => { this.alert(message) }, 300)
			},

			alert: function(message, type = 'success') {
				clearTimeout(this.alertTimeout)

				this.alertMessage = message
				this.alertType = type
				this.alertShow = true

				this.alertTimeout = setTimeout(() => { this.alertReset() }, 5000)
			},

			alertReset: function() {
				this.alertShow = false
				setTimeout(() => {
					this.alertMessage= null
					this.alertType	 = null
				}, 300)
			},
		}
	}

	function ticketImage() {
		return {
			thumbnail	: null,
			preview		: null,

			thumbnailShow	: true,
			previewShow		: false,

			// thumbnailX	: null,
			// thumbnailY	: null,
			// thumbnailW	: null,
			// thumbnailH	: null,
			//
			// previewX	: null,
			// previewY	: null,
			// previewW	: null,
			// previewH	: null,
			//
			// wW	: null,
			// wH	: null,

			define : function(id) {
				this.thumbnail = document.querySelector(`#thumbnail-${ id }`)
				this.preview = document.querySelector(`#preview-${ id }`)
			},

			imagePreview : function() {
				clearInterval(ticketSyncInterval)
				this.thumbnailShow = false
				this.previewShow = true
			},

			previewClose: function() {
				this.previewShow = false
				this.thumbnailShow = true
				ticketSync()
			}
		}
	}
</script>
