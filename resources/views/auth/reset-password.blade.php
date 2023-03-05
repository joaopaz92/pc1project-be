<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="form-floating mb-3">
            <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@example.com" />
            <x-input-label for="email" :value="__('Email')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-floating mb-4">

            <x-text-input   id="password" class="block mt-1 w-full form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password"  placeholder="Password"/>
            <x-input-label for="password" :value="__('Password')" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->

        <div class="form-floating mb-4">
            

            <x-text-input id="password_confirmation" class="block mt-1 w-full form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="btn btn-primary py-3 w-100 mb-4">
            {{ __('Reset Password') }}
        </x-primary-button>
    </form>
</x-guest-layout>
