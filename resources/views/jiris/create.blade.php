<x-app-layout>
    <h1 class="font-bold text-2xl first-letter:capitalize">{!! __('create a new jiri') !!}</h1>
    <form action="{{ route('jiris.store') }}"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
        <fieldset class="flex flex-col gap-4">
            <legend class="font-bold uppercase mb-2 tracking-wider">{{ __('your jiri') }}</legend>
            <x-input-with-label id="name"
                                name="name"
                                type="text"
                                label-text="name"
                                help-text="min 3 chars, max 255"
                                value="{{ old('name') }}"
                                placeholder="jiri name"
            />
            @php $now = now()->format('Y-m-d H:i') @endphp
            <x-input-with-label id="starting_at"
                                name="starting_at"
                                type="text"
                                label-text="starting at"
                                help-text="formated like 1970-01-01 00:00"
                                value="{{ old('starting_at') }}"
                                placeholder="{{ $now }}"
            />
        </fieldset>
        @if($contacts->count()>0)
            <fieldset>
                <legend class="mb-2">
                    <span class=" font-bold uppercase tracking-wider">{!! __('participants') !!}</span>
                    <span class="block">{!! __('sorted by family name') !!}</span>
                    @if($errors->has('evaluators') || $errors->has('students'))
                        <span class="text-red-500 block">{!! $errors->first('students') ?: $errors->first('evaluators') !!}</span>
                    @endif
                </legend>
                <div class="flex gap-8">
                    <section>
                        <h2 class="font-bold mb-2 first-letter:capitalize">{!! __('students') !!}</h2>
                        <ol>
                            @foreach($contacts as $contact)
                                <li>
                                    <x-input-with-label id="student-{{ $contact->id }}"
                                                        name="students[]"
                                                        type="checkbox"
                                                        label-text="{{ $contact->fullname }}"
                                                        value="{{ $contact->id }}"
                                    />
                                </li>
                            @endforeach
                        </ol>
                    </section>
                    <section>
                        <h2 class="font-bold mb-2 first-letter:capitalize">{!! __('evaluators') !!}</h2>
                        <ol>
                            @foreach($contacts as $contact)
                                <li>
                                    <x-input-with-label id="evaluator-{{ $contact->id }}"
                                                        name="evaluators[]"
                                                        type="checkbox"
                                                        label-text="{{ $contact->fullname }}"
                                                        value="{{ $contact->id }}"
                                    />
                                </li>
                            @endforeach
                        </ol>
                    </section>
                </div>
            </fieldset>
        @else
            <p>{!! __('no contacts available yet, consider creating some in the contacts section') !!}</p>
        @endif
        <fieldset>
            <legend class="font-bold uppercase mb-2 tracking-wider">{!! __('the assignments') !!}</legend>
            <ol>
                <li><input type="checkbox"
                           value="">Assignments
                </li>
            </ol>
        </fieldset>
        <x-form-submission-button class="bg-blue-500">{!! __('create this jiri') !!}</x-form-submission-button>
    </form>
</x-app-layout>
