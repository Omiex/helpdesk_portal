<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
				<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
				    <div>
				        <x-jet-application-logo class="block h-12 w-auto" />
				    </div>

				    <div class="mt-8 text-2xl">
				        Selamat datang di halaman Helpdesk Portal
				    </div>
				</div>

				<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
					@role('user')
					    <div class="p-6">
					        <div class="flex items-center">
					            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
									<path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
									</path>
								</svg>
					            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Open Ticket</div>
					        </div>

					        <div class="ml-12">
								<livewire:open-ticket />
					        </div>
					    </div>

					    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
					        <div class="flex items-center">
					            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
									<path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
									</path>
									<path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
								</svg>
					            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laracasts.com">Information</a></div>
					        </div>

					        <div class="ml-12">
					            <div class="mt-2 text-sm text-gray-500">
					                <p>
										Alamat IP anda adalah <strong>{{ Request::ip() }}</strong>
									</p>
									<p>
										jika perangkat ini terhubung melalui kabel LAN dan IP tersebut tidak sesuai dengan yang tertera di meja, silakan hubungi IT
									</p>
					            </div>
					        </div>
					    </div>
					@endrole

				    <div class="p-6 border-t border-gray-200">
						<livewire:queue type="new request" />
				    </div>

				    <div class="p-6 border-t border-gray-200 md:border-l">
						<livewire:queue type="on progress" />
				    </div>
				</div>
            </div>
        </div>
    </div>
	<script>
		setInterval(function() { Livewire.emit('queueRefresh') }, 3000)
	</script>
</x-app-layout>
