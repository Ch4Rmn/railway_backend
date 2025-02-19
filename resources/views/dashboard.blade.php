    {{-- <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 dark:tw-text-gray-200 tw-leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    @extends('layouts.app')

    @section('title', 'Dashboard')

    @section('header')
        <div class="d-flex justify-between align-content-center text-dark tw-bg-gray-400 tw-rounded-sm tw-m-2 shadow">
            <div class="m-1 d-inline-flex">
                <i class="fas fa-th tw-p-2"></i>
                <h1 class="tw-text-2xl tw-font-semibold tw-leading-tight tw-pe-2">
                    {{ __('Dashboard') }}
                </h1>
            </div>
        </div>
    @endsection


    @section('content')
        <div class="tw-py-1">
            {{-- <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8">
                <div class="tw-bg-white dark:tw-bg-gray-800 tw-overflow-hidden tw-shadow-sm sm:tw-rounded-lg">
                    <div class="tw-p-6 tw-text-gray-900 dark:tw-text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div> --}}
            <x-card>
                <div class="row tw-p-4">
                    <div class="col-3"></div>
                    <div class="text-center col-5">
                        <img src="{{ asset('images/Control Panel.gif') }}" alt="" class="img-fluid">

                        <h5 class="tw-font-bold">Welcome from {{ config('app.name') }}</h5>
                    </div>
                    <div class="col-3"></div>
                </div>
            </x-card>
        </div>

    @endsection
