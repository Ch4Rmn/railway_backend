@if (count($errors) > 0)
{{-- @if ($errors) --}}
    <div class="tw-flex tw-p-4 tw-mt-4 tw-text-sm tw-text-red-800 tw-border tw-border-red-300 tw-rounded-lg tw-bg-red-50 dark:tw-bg-gray-800 dark:tw-text-red-400"
        role="alert">
        <i class="fas fa-exclamation-triangle tw-mr-2 tw-mt-1"></i>
        <span class="tw-sr-only">Danger</span>
        <div>
            <span class="tw-font-medium">Ensure that these requirements are met:</span>
            <ul class="tw-mt-1.5 tw-list-disc tw-list-inside">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="tw-text-red-600">{{ $error }}</p>
                    @endforeach
                @endif
                {{-- <li>At least 10 characters (and up to 100 characters)</li>
            <li>At least one tw-lowercase character</li>
            <li>Inclusion of at least one special character, e.g., ! @ # ?</li> --}}
            </ul>
        </div>
    </div>
@endif
