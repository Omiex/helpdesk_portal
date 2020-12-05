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
