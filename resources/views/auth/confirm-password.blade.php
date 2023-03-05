<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="form-floating mb-4">

            <x-text-input   id="password" class="block mt-1 w-full form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password"  placeholder="Password"/>
            <x-input-label for="password" :value="__('Password')" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

    <x-primary-button class="btn btn-primary py-3 w-100 mb-4">
        {{ __('Confirm') }}
    </x-primary-button>
    </form>
</x-guest-layout>
