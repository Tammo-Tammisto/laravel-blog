<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <input id="name" name="name" type="text" placeholder="{{ __('Name') }}"
                   value="{{ old('name', $user->name) }}" class="input input-bordered w-full @error('name') input-error @enderror" required autofocus autocomplete="name" />
            @error('name')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input id="email" name="email" type="email" placeholder="{{ __('Email') }}"
                   value="{{ old('email', $user->email) }}" class="input input-bordered w-full @error('email') input-error @enderror" required autocomplete="username" />
            @error('email')
                <span class="text-error">{{ $message }}</span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="btn btn-link">{{ __('Click here to re-send the verification email.') }}</button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-success">{{ __('A new verification link has been sent to your email address.') }}</p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-success">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>