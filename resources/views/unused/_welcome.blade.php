<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible"
              content="ie=edge">
        <title>Jiris - {!! __('your jiris management app') !!}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="pb-4 font-sans">
        <a class="sr-only"
           href="#main-menu">{!! __('go to main menu') !!}</a>
        <div class="flex flex-col-reverse gap-6">
            <main class="flex flex-col gap-4 px-4">
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
                                   class="font-bold">{!! __('email address') !!}
                                <span class="block font-normal text-gray-500">{!! __('must be valid and exist in our system') !!}</span></label>
                            <input id="email"
                                   type="email"
                                   value="{!! old('email') !!}"
                                   name="email"
                                   placeholder="{!! __('jon@doe.com') !!}"
                                   autocapitalize="none"
                                   autocorrect="off"
                                   spellcheck="false"
                                   class="border border-gray-300 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">

                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="password"
                                   class="font-bold">{!! __('password') !!}
                                <span class="block font-normal text-gray-500">{!! __('at least 8 characters, letters, digits, and special chars (+-*/%!?_)') !!}</span></label>
                            <input id="password"
                                   type="password"
                                   value=""
                                   name="password"
                                   placeholder="password"
                                   autocapitalize="none"
                                   autocorrect="off"
                                   spellcheck="false"
                                   class="border border-gray-300 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
                        </div>
                        <div>
                            <input id="remember"
                                   type="checkbox"
                                   value=""
                                   name="remember"
                                   placeholder=""
                                   autocapitalize="none"
                                   autocorrect="off"
                                   spellcheck="false"
                                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
                            <label for="remember"
                                   class="font-medium">{!! __('remember me for 15 days') !!}</label>
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
            </main>
            <x-navigations.guest/>
        </div>
    </body>
</html>
