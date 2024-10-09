@props([
    'id',
    'labelText',
    'helpText',
    'name'
])

<label for="{{ $id }}"
        {{ $attributes->class(['font-medium first-letter:uppercase']) }}>{!! __($labelText) !!}
    @if(isset($helpText))
        <span class="block font-normal text-gray-500">{!! __($helpText) !!}</span>
    @endif
    @error($name)
    <span class="text-red-500 block">{!!  $message  !!}</span>
    @enderror
</label>
