<div {{ $attributes->class(['flex justify-between']) }}>
    <h1 class="text-xl text-blue-900 font-bold first-letter:capitalize text-blue-900">
        {{ $title }}
    </h1>
    <x-link :route="$route"
            class="cursor-pointer"
            icon="add"
            icon-position="before">
        <span class="sr-only">{{ $link }}</span>
    </x-link>
</div>
