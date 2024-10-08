<x-guest-layout>
    <div class="mb-4">
        <h1 class="font-bold text-2xl mb-4 first-letter:uppercase">{!! __('jiri, the app for managing your jiris') !!}</h1>
        <p class="first-letter:capitalize">{!! __('intro to jiri') !!}</p>
    </div>
    <section class="bg-slate-50 drop-shadow-[0px_0px_1px_rgba(0,0,0,0.15)] rounded-md p-4 flex flex-col gap-8">
        <div>
            <h2 class="uppercase font-bold">
                {!! __('identify yourself!') !!}
            </h2>
            <p>{!! __('it is mandatory to identify yourself in order to access your jiris, contacts and projects') !!}</p>
        </div>
        <form action="{{ route('login') }}"
              method="post"
              class="flex flex-col gap-8">
            @csrf
            <div class="flex flex-col gap-2">
                <label for="email"
                       class="font-bold first-letter:capitalize">{!! __('email address') !!}
                    @error('email')
                    <span class="text-red-500 block">{!!  $message  !!}</span>
                    @enderror
                </label>
                <input id="email"
                       type="email"
                       value="{!! old('email') !!}"
                       name="email"
                       placeholder="{!! __('jon@doe.com') !!}"
                       autocapitalize="none"
                       autocorrect="off"
                       spellcheck="false"
                       class="border border-gray-300 focus:invalid:border-red-500 invalid:text-red-600 rounded-md p-2 placeholder-gray-300">

            </div>
            <div class="flex flex-col gap-2">
                <label for="password"
                       class="font-bold first-letter:capitalize">{!! __('password') !!}
                    @error('password')
                    <span class="text-red-500 block">{!!  $message  !!}</span>
                    @enderror
                </label>
                <input id="password"
                       type="password"
                       value=""
                       name="password"
                       spellcheck="false"
                       class="border border-gray-300 focus:invalid:border-red-500 invalid:text-red-600 rounded-md p-2">
            </div>
            <div class="flex gap-2 items-center">
                <input id="remember"
                       type="checkbox"
                       value=""
                       name="remember"
                       class="border border-grey-300 rounded-md p-2">
                <label for="remember"
                       class="font-medium first-letter:capitalize">{!! __('remember me for 15 days') !!}</label>
            </div>
            <div>
                <button type="submit"
                        class="bg-blue-500 font-bold text-white rounded-md p-2 px-4 tracking-wider uppercase">
                    S’identifier
                </button>
            </div>
        </form>
        <a href="{!! route('register') !!}"
           class="block text-right underline">{!! __('i don\'t have an account yet') !!}</a>
    </section>
</x-guest-layout>
