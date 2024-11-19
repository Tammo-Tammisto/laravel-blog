@extends('partials.layout')
@section('title', 'Reset Password')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 w-1/2 shadow-xl mx-auto">
            <div class="card-body">
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">{{ __('Email') }}</span>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}"
                               placeholder="Email" class="input input-bordered @error('email') input-error @enderror w-full" required autofocus autocomplete="username" />
                        <div class="label">
                            @error('email')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <!-- Password -->
                    <label class="form-control w-full mt-4">
                        <div class="label">
                            <span class="label-text">{{ __('Password') }}</span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Password" 
                               class="input input-bordered @error('password') input-error @enderror w-full" required autocomplete="new-password" />
                        <div class="label">
                            @error('password')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <!-- Confirm Password -->
                    <label class="form-control w-full mt-4">
                        <div class="label">
                            <span class="label-text">{{ __('Confirm Password') }}</span>
                        </div>
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" 
                               class="input input-bordered @error('password_confirmation') input-error @enderror w-full" required autocomplete="new-password" />
                        <div class="label">
                            @error('password_confirmation')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <!-- Submit Button -->
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection