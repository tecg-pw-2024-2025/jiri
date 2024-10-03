<x-navigations.layout>
    <ul class="flex flex-row gap-4 items-center">
        <li><a class="underline text-white uppercase tracking-wider"
               href="{{ route('jiris.index') }}">{!! __('jiris') !!}</a></li>
        <li><a class="underline text-white uppercase tracking-wider"
               href="{{ route('contacts.index') }}">{!! __('contacts') !!}</a></li>
        <li><a class="underline text-white uppercase tracking-wider"
                href="{{ route('projects.index') }}">{!! __('projects') !!}</a></li>
        <li class="ml-auto">
            <form action="{{ route('logout') }}"
                  method="post">
                @csrf
                <x-form-submission-button class="bg-red-500">{!! __('logout') !!}</x-form-submission-button>
            </form>
        </li>

    </ul>
</x-navigations.layout>
