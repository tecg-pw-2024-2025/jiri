<x-guest-layout>
    <div class="mb-4">
        <h1 class="font-bold text-2xl mb-4 first-letter:uppercase">{!! __('jiri, the app for managing your jiris') !!}</h1>
        <p class="first-letter:capitalize">{!! __('intro to jiri') !!}</p>
    </div>
    <section class="bg-slate-50 drop-shadow-[0px_0px_1px_rgba(0,0,0,0.15)] rounded-md p-4 flex flex-col gap-8">
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
            />
            <x-input-with-label id="password"
                                name="password"
                                type="password"
                                label-text="password"
                                help-text="at least 8 characters, letters, digits, and special chars (+-*/%!?_)"
            />
            <div>
                <x-form-submission-button class="bg-blue-500">{!! __('register') !!}</x-form-submission-button>
            </div>
        </form>
        <a href="{{ route('login') }}"
           class="block text-right underline">{!! __('i already have an account') !!}</a>
    </section>
</x-guest-layout>
