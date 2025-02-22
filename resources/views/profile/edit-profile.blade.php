    {{-- <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 dark:tw-text-gray-200 tw-leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    @extends('layouts.app')

    @section('title', 'Edit Profile')

    @section('header')
        <div class="d-flex justify-between align-content-center text-dark tw-bg-gray-400 tw-rounded-sm tw-m-2 shadow">
            <div class="m-1 d-inline-flex">
                <i class="fas fa-th tw-p-2"></i>
                <h1 class="tw-text-2xl tw-font-semibold tw-leading-tight tw-pe-2 ">
                    <a href="/" class="text-decoration-none">{{ __('Edit Profile') }}</a>
                </h1>
            </div>
        </div>
    @endsection


    @section('content')
        {{-- <div class="tw-py-1"> --}}
        {{-- <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8">
                <div class="tw-bg-white dark:tw-bg-gray-800 tw-overflow-hidden tw-shadow-sm sm:tw-rounded-lg">
                    <div class="tw-p-6 tw-text-gray-900 dark:tw-text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div> --}}
        <x-card>
            <div class="row tw-p-4 container-fluid">
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" class="tw-w-full tw-space-y-6" id="form">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <x-input-label for="name" :value="__('Name')"
                            class="tw-block tw-font-medium tw-text-sm tw-text-gray-700 dark:tw-text-gray-800 text-dark" />
                        <x-text-input id="name" name="name" type="text" class="tw-mt-1 tw-block tw-w-full"
                            style="width: 100% !important;" :value="old('name', $user->name)" autofocus autocomplete="name" />
                        {{-- <x-input-error class="tw-mt-2" :messages="$errors->get('name')" /> --}}
                    </div>

                    <div class="form-group">
                        <x-input-label for="email" :value="__('Email')"
                            class="tw-block tw-font-medium tw-text-sm tw-text-gray-700 dark:tw-text-gray-800 text-dark" />
                        <x-text-input id="email" name="email" type="email" class="tw-mt-1 tw-block tw-w-full"
                            :value="old('email', $user->email)" autocomplete="username" />
                        {{-- <x-input-error class="tw-mt-2" :messages="$errors->get('email')" /> --}}

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div>
                                <p class="tw-text-sm tw-mt-2 tw-text-gray-800 dark:tw-text-gray-200">
                                    {{ __('Your email address is unverified.') }}

                                    <button form="send-verification"
                                        class="tw-underline tw-text-sm tw-text-gray-600 dark:tw-text-gray-400 hover:tw-text-gray-900 dark:hover:tw-text-gray-100 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500 dark:focus:tw-ring-offset-gray-800">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="tw-mt-2 tw-font-medium tw-text-sm tw-text-green-600 dark:tw-text-green-400">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="tw-flex tw-items-center tw-gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                        <x-cancel-button>{{ __('Cancel') }}</x-cancel-button>

                        @if (session('status') === 'profile-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                class="tw-text-sm tw-text-gray-600 dark:tw-text-gray-400">{{ __('Saved.') }}</p>
                        @endif
                    </div>
                    {{--  --}}

                </form>
            </div>
        </x-card>
        {{-- </div> --}}

    @endsection
    @push('scripts')
        {!! JsValidator::formRequest('App\Http\Requests\ProfileUpdateRequest', '#form') !!}
    @endpush
