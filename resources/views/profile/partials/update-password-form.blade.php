<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <input id="update_password_current_password" name="current_password" type="password"
                   placeholder="{{ __('Current Password') }}" class="input input-bordered w-full @error('current_password') input-error @enderror" />
            @error('current_password')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input id="update_password_password" name="password" type="password"
                   placeholder="{{ __('New Password') }}" class="input input-bordered w-full @error('password') input-error @enderror" />
            @error('password')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                   placeholder="{{ __('Confirm Password') }}" class="input input-bordered w-full @error('password_confirmation') input-error @enderror" />
            @error('password_confirmation')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-success">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>