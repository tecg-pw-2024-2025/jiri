@props(['type'=>'text', 'name', 'id','label-text', 'value', 'placeholder', 'help-text'])

<div {{ $attributes->class(['flex gap-2',
                    'flex-col' => ($type !== 'checkbox' && $type !== 'radio'),
                    'items-center' => ($type === 'checkbox' || $type === 'radio'),
                    ]) }}>
    @if($type !== 'checkbox' && $type !== 'radio')
        <x-form-field-label :id="$id" :label-text="$labelText" :help-text="$helpText ?? ''" :name="$name" />
    @endif
    <input id="{{ $id }}"
           type="{{ $type }}"
           name="{{ $name }}"
           @if(isset($value))
               value="{{ $value }}"
           @endif
           @if(isset($placeholder))
               placeholder="{!! __($placeholder) !!}"
           @endif
           autocapitalize="none"
           autocorrect="off"
           spellcheck="false"
           class="border border-gray-300 focus:invalid:border-red-500 invalid:text-red-600 rounded-md p-2 placeholder-gray-300">
    @if($type==='checkbox' || $type==='radio')
            <x-form-field-label :id="$id" :label-text="$labelText" :help-text="$helpText ?? ''" :name="$name" />
    @endif

</div>
