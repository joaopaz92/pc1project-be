@section('title', 'Register')
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf        
        <!-- Name -->
        <div class="form-floating mb-3">
            <x-text-input id="floatingText" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="jhondoe"/>
            <x-input-label for="name" :value="__('Name')" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

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
        {{ __('Register') }}
    </x-primary-button>
    <p class="text-center mb-0">Already have an Account? <a href="{{ route('login') }}">{{ __('Sign In') }}</a></p>
    </form>
</x-guest-layout>
