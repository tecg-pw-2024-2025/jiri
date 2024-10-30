<x-guest-layout>
    <div class="mb-4">
        <h1 class="font-bold text-xl text-blue-900 mb-4 first-letter:capitalize">{!! __('jiri, the app for managing your jiris') !!}</h1>
        <p class="first-letter:capitalize">{!! __('intro to jiri') !!}</p>
    </div>
    <section class="bg-stone-100 shadow border border-stone-200 rounded-md p-4 flex flex-col gap-8">
        <div>
            <h2 class="uppercase font-bold mb-4">
                {!! __('join jiri') !!}
            </h2>
            <p>En vous créant un compte, vous pourrez tirer parti de toutes les fonctionnalités de Jiri. Vous
                pourrez créer de nouveaux jurys, ajouter des contacts et des projets et monitorer vos jurys en temps
                réel.</p>
        </div>
        <form action="{!! route('register') !!}"
              method="post"
              class="flex flex-col gap-6">
            @csrf
            <x-input-with-label id="email"
                                name="email"
                                type="email"
                                label-text="email address"
                                value="{{ old('email') }}"
                                placeholder="jon@doe.com"
                                autofocus
            />
            <x-input-with-label id="password"
                                name="password"
                                type="password"
                                label-text="password"
                                help-text="at least 8 characters, letters, digits, and special chars (+-*/%!?_)"
            />
            <div>
                <x-form-submission-button class="bg-blue-700"
                                          icon="register">{!! __('register') !!}</x-form-submission-button>
            </div>
        </form>
        <x-link class="text-right"
                :route="route('login')">{!! __('i already have an account') !!}</x-link>
    </section>
</x-guest-layout>
