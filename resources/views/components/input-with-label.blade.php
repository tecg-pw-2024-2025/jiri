@props([
    'type'=>'text',
    'required'=>false,
    'name',
    'id',
    'label-text',
    'value'=>'',
    'placeholder',
    'autofocus'=>false,
    'help-text',
    'checkedIds'=>[],
    'model'=>null
    ])

<div {{ $attributes->class(['flex gap-2',
                    'flex-col' => ($type !== 'checkbox' && $type !== 'radio'),
                    'items-center' => ($type === 'checkbox' || $type === 'radio'),
                    ]) }}>
    @if($type !== 'checkbox' && $type !== 'radio')
        <x-form-field-label :id="$id"
                            :label-text="$labelText"
                            :help-text="$helpText ?? ''"
                            :name="$name"/>
    @endif
    @if($type === 'textarea')
        <textarea id="{{ $id }}"
                  name="{{ $name }}"
                  placeholder="{!! __($placeholder) !!}"
                  autocapitalize="none"
                  autocorrect="off"
                  spellcheck="false"
                  @if($model)
                      wire:model.live="{{$model}}"
                  @endif
                  @if($autofocus)
                      autofocus
                  @endif
                  @if($required)
                      required
                  @endif
                  class="border border-gray-300 focus:invalid:border-red-500 invalid:text-red-600 rounded-md p-2 placeholder-gray-300"
        >@if(!$model)
                {{ $value }}
            @endif</textarea>
    @else
        <input id="{{ $id }}"
               type="{{ $type }}"
               name="{{ $name }}"
               @if(isset($value))
                   value="{{ $value }}"
               @endif
               @if($model)
                   wire:model.live="{{$model}}"
               @endif
               @if(isset($placeholder))
                   placeholder="{!! __($placeholder) !!}"
               @endif
               autocapitalize="none"
               autocorrect="off"
               spellcheck="false"
               @if($autofocus)
                   autofocus
               @endif
               @checked(in_array($value, $checkedIds, true))
               class="border border-gray-300 focus:invalid:border-red-500 invalid:text-red-600 rounded-md p-2 placeholder-gray-300"
        >
    @endif
    @if($type==='checkbox' || $type==='radio')
        <x-form-field-label :id="$id"
                            :label-text="$labelText"
                            :help-text="$helpText ?? ''"
                            :name="$name"/>
    @endif

</div>
