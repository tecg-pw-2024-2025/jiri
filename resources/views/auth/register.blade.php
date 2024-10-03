<x-guest-layout>
    <main class="flex flex-col gap-4 px-4">
        <h1 class="font-bold text-2xl first-letter:uppercase">{!! __('register') !!}</h1>
        <section class="bg-slate-50 drop-shadow-[0px_0px_1px_rgba(0,0,0,0.15)] rounded-md p-4 flex flex-col gap-8">
            <div>
                <h2 class="uppercase font-bold mb-4">
                    {!! __('join jiri') !!}
                </h2>
                <p>En vous créant un compte, vous pourrez tirer parti de toutes les fonctionnalités de Jiri. Vous
                   pourrez créer de nouveaux jurys, ajouter des contacts et des projets et monitorer vos jurys en temps réel.</p>
            </div>
            <form action="/register"
                  method="post"
                  class="flex flex-col gap-6">
                <input type="hidden"
                       name="_csrf"
                       value="ee007ae2896e725c4c6b629ca667e14d6685005889b584763d0b02d784d76a3e">
                <div class="flex flex-col gap-2">
                    <label for="email"
                           class="font-bold first-letter:uppercase">{!! __('email address') !!}<span class="block font-normal text-gray-500">{!! __('must be valid and exist in our system') !!}</span></label>
                    <input id="email"
                           type="email"
                           value="{{ old('email') }}"
                           name="email"
                           placeholder="{!! __('jon@doe.com') !!}"
                           autocapitalize="none"
                           autocorrect="off"
                           spellcheck="false"
                           class="border border-gray-300 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">

                </div>
                <div class="flex flex-col gap-2">
                    <label for="password"
                           class="font-bold first-letter:uppercase">{!! __('password') !!}<span class="block font-normal text-gray-500">{!! __('at least 8 characters, letters, digits, and special chars (+-*/%!?_)') !!}</span></label>
                    <input id="password"
                           type="text"
                           value=""
                           name="password"
                           placeholder="{!! __('password') !!}"
                           autocapitalize="none"
                           autocorrect="off"
                           spellcheck="false"
                           class="border border-gray-300 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
                </div>
                <div>
                    <x-form-submission-button class="bg-blue-500">{!! __('register') !!}</x-form-submission-button>
                </div>
            </form>
            <a href="{{ route('login') }}"
               class="block text-right underline">{!! __('i already have an account') !!}</a>
        </section>
    </main>
</x-guest-layout>
