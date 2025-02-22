    {{-- <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 dark:tw-text-gray-200 tw-leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    @extends('layouts.app')

    @section('title', 'Edit Password')

    @section('header')
        <div class="d-flex justify-between align-content-center text-dark tw-bg-gray-400 tw-rounded-sm tw-m-2 shadow">
            <div class="m-1 d-inline-flex">
                <i class="fas fa-th tw-p-2"></i>
                <h1 class="tw-text-2xl tw-font-semibold tw-leading-tight tw-pe-2 ">
                    <a href="/" class="text-decoration-none">{{ __('Edit Password') }}</a>
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
            <x-error-flash-message></x-error-flash-message>
            <div class="row tw-p-4 container-fluid">
                <form method="post" action="{{ route('update-password') }}" class="tw-w-full tw-space-y-6" id="form">
                    @csrf
                    @method('put')

                    <div>
                        <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                        <x-text-input id="update_password_current_password" name="current_password" type="password"
                            class="tw-mt-1 tw-block tw-w-full" autocomplete="current-password" />
                        {{-- <x-input-error :messages="$errors->updatePassword->get('current_password')" class="tw-mt-2" /> --}}
                    </div>

                    <div>
                        <x-input-label for="update_password_password" :value="__('New Password')" />
                        <x-text-input id="update_password_password" name="password" type="password"
                            class="tw-mt-1 tw-block tw-w-full" autocomplete="new-password" />
                        {{-- <x-input-error :messages="$errors->updatePassword->get('password')" class="tw-mt-2" /> --}}
                    </div>

                    <div>
                        <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                            type="password" class="tw-mt-1 tw-block tw-w-full" autocomplete="new-password" />
                        {{-- <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="tw-mt-2" /> --}}
                    </div>

                    <div class="tw-flex tw-items-center tw-gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                        <x-cancel-button>{{ __('Cancel') }}</x-cancel-button>

                        @if (session('status') === 'password-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                class="tw-text-sm tw-text-gray-600 dark:tw-text-gray-400">{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </form>
            </div>
        </x-card>
        {{-- </div> --}}

    @endsection
    @push('scripts')
        {!! JsValidator::formRequest('App\Http\Requests\PasswordUpdateRequest', '#form') !!}
    @endpush
