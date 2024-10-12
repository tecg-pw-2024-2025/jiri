<x-navigations.layout>
    <x-application-logo class="w-10 h-10" />
    <x-slot:items>
        <x-navigations.main-navigation-item route="jiris.index"
                                            text="jiris" />
        <x-navigations.main-navigation-item route="contacts.index"
                                            text="contacts" />
        <x-navigations.main-navigation-item route="projects.index"
                                            text="projects" />
        <li class="ml-auto">
            <form action="{{ route('logout') }}"
                  method="post">
                @csrf
                <x-form-submission-button class="bg-red-700"
                                          icon="logout">{!! __('logout') !!}</x-form-submission-button>
            </form>
        </li>
    </x-slot:items>
</x-navigations.layout>
