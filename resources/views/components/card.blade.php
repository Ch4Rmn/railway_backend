{{-- <div class="dark:tw-bg-white tw-shadow tw-rounded-lg text-dark">
    {{ $slot }}
</div> --}}

{{--  --}}
<div {{ $attributes->merge(['class' => 'dark:tw-bg-white tw-shadow tw-rounded-lg text-dark']) }}>
    {{ $slot }}
</div>
