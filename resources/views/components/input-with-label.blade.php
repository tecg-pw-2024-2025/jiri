<div class="flex flex-col gap-2">
    <label for="{{ $attributes->get('id') }}"
           class="font-bold first-letter:uppercase">{!! __($attributes->get('label-text')) !!}
        @if($attributes->has('help-text'))
            <span class="block font-normal text-gray-500">{!! __($attributes->get('help-text')) !!}</span>
        @endif
        @error($attributes->get('name'))
        <span class="text-red-500 block">{!!  $message  !!}</span>
        @enderror
    </label>
    <input id="{{ $attributes->get('id') }}"
           type="{{ $attributes->get('type') }}"
           value="{{ $attributes->get('value') }}"
           name="{{ $attributes->get('name') }}"
           placeholder="{!! __($attributes->get('placeholder')) !!}"
           autocapitalize="none"
           autocorrect="off"
           spellcheck="false"
           class="border border-gray-300 focus:invalid:border-red-500 invalid:text-red-600 rounded-md p-2 placeholder-gray-300">

</div>
