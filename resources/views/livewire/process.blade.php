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
	function table() {
		return {
			show: false,
			modalOpen: false,
			action: '',
			id: '',
			ticket_number: '',
			desc: '',

			prompt: function(action, id, ticket_number) {
				this.action = action
				this.id = id
				this.ticket_number = ticket_number
				this.modalOpen = true
			},

			clear: function() {
				this.modalOpen = false
				this.action = ''
				this.id = ''
				this.ticket_number = ''
				this.desc = ''
			},

			simpan: async function() {
				await @this.create(this.action, this.id, this.desc)
				this.clear()
			}
		}
	}
</script>
