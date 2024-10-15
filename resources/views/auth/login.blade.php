<x-guest-layout>
    <div class="mb-4">
        <h1 class="font-bold text-xl text-blue-900 mb-4 first-letter:capitalize">{!! __('jiri, the app for managing your jiris') !!}</h1>
        <p class="first-letter:capitalize">{!! __('intro to jiri') !!}</p>
    </div>
    <section class="bg-slate-50 drop-shadow-[0px_0px_1px_rgba(0,0,0,0.15)] rounded-md p-4 flex flex-col gap-8">
        <div>
            <h2 class="uppercase font-bold mb-4">
                {!! __('identify yourself!') !!}
            </h2>
            <p>{!! __('it is mandatory to identify yourself in order to access your jiris, contacts and projects') !!}</p>
        </div>
        <form action="{{ route('login') }}"
              method="post"
              class="flex flex-col gap-8">
            @csrf
            <x-input-with-label id="email"
                                name="email"
                                type="email"
                                label-text="email address"
                                value="{{ old('email') }}"
                                placeholder="jon@doe.com"
                                autofocus="true"
            />
            <x-input-with-label id="password"
                                name="password"
                                type="password"
                                label-text="password"
            />
            <x-input-with-label id="remember"
                                name="remember"
                                type="checkbox"
                                label-text="remember me for 15 days"
            />



            <div>
                <x-form-submission-button class="bg-blue-700"
                                          icon="login">{!! __('login') !!}</x-form-submission-button>
            </div>
        </form>
        <x-link class="text-right"
                :route="route('register')">{!! __('i don\'t have an account yet') !!}</x-link>
    </section>
</x-guest-layout>
