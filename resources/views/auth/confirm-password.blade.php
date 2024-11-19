@extends('partials.layout')
@section('title', 'Confirm Password')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 w-1/2 shadow-xl mx-auto">
            <div class="card-body">
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </div>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">{{ __('Password') }}</span>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password" 
                               class="input input-bordered @error('password') input-error @enderror w-full" />
                        <div class="label">
                            @error('password')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <div class="flex justify-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection