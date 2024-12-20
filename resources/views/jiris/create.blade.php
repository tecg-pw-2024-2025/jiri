<x-app-layout>
    <h1 class="font-bold text-xl text-blue-900 first-letter:capitalize">{!! __('create a new jiri') !!}</h1>
    <x-jiri-form action="{{ route('jiris.store') }}"
                 method="post">
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
                                autofocus
                                required
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
            <section>
                <fieldset>
                    <legend class="mb-2">
                        <h2 class=" font-bold uppercase tracking-wider">{!! __('participants') !!}</h2>
                        <span class="block">{!! __('sorted by family name') !!}</span>
                        @if($errors->has('evaluators') || $errors->has('students'))
                            <span
                                class="text-red-500 block">{!! $errors->first('students') ?: $errors->first('evaluators') !!}</span>
                        @endif
                    </legend>
                    <div class="flex gap-8">
                        <section>
                            <h3 class="font-bold mb-2 first-letter:capitalize">{!! __('students') !!}</h3>
                            <ol>
                                @foreach($contacts as $contact)
                                    <li>
                                        <x-input-with-label id="student-{{ $contact->id }}"
                                                            name="students[]"
                                                            type="checkbox"
                                                            label-text="{{ $contact->fullname }}"
                                                            value="{{ $contact->id }}"
                                                            :checked-ids="old('students', [])"
                                        />
                                    </li>
                                @endforeach
                            </ol>
                        </section>
                        <section>
                            <h3 class="font-bold mb-2 first-letter:capitalize">{!! __('evaluators') !!}</h3>
                            <ol>
                                @foreach($contacts as $contact)
                                    <li>
                                        <x-input-with-label id="evaluator-{{ $contact->id }}"
                                                            name="evaluators[]"
                                                            type="checkbox"
                                                            label-text="{{ $contact->fullname }}"
                                                            value="{{ $contact->id }}"
                                                            :checked-ids="old('evaluators', [])"
                                        />
                                    </li>
                                @endforeach
                            </ol>
                        </section>
                    </div>
                </fieldset>
            </section>
        @else
            <p>{!! __('no contacts available yet, consider creating some in the contacts section') !!}</p>
        @endif

        @if($projects->count()>0)
            <section>
                <fieldset>
                    <legend class="mb-2">
                        <h2 class=" font-bold uppercase tracking-wider">{!! __('projects') !!}</h2>
                        <span class="block">{!! __('sorted by name') !!}</span>
                        @if($errors->has('projects'))
                            <span class="text-red-500 block">{!! $errors->first('projects') !!}</span>
                        @endif
                    </legend>
                    <div class="flex gap-8">
                        <ol>
                            @foreach($projects as $project)
                                <li>
                                    <x-input-with-label id="project-{{ $project->id }}"
                                                        name="projects[]"
                                                        type="checkbox"
                                                        label-text="{{ $project->name }}"
                                                        value="{{ $project->id }}"
                                                        :checked-ids="old('projects', [])"
                                    />
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </fieldset>
            </section>
        @else
            <p>{!! __('no projects available yet, consider creating some in the projects section') !!}</p>
        @endif
        <div>
            <x-form-submission-button class="bg-blue-700"
                                      icon="add">
                {!! __('create this jiri') !!}
            </x-form-submission-button>
        </div>
    </x-jiri-form>
</x-app-layout>
