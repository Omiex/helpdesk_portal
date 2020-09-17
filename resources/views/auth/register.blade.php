<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mt-4">
                <x-jet-label value="{{ __('ID Karyawan') }}" />
                <x-jet-input class="block mt-1 w-full" type="number" name="nik" :value="old('nik')" required autofocus autocomplete="nik" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Nama') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Divisi') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="divisi" :value="old('divisi')" required autocomplete="divisi" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Jabatan') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="jabatan" :value="old('jabatan')" required autocomplete="jabatan" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Lokasi') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="lokasi" :value="old('lokasi')" required autocomplete="lokasi" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Telepon') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="telepon" :value="old('telepon')" required autocomplete="telepon" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Confirm Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
