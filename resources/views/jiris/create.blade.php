<x-layouts.main>
    <h1 class="font-bold text-2xl">Create a new Jiri</h1>
    <form action="/jiris"
          method="post"
          class="flex flex-col gap-8 bg-slate-50 p-4">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="name"
                   class="font-bold">Name<span class="block font-normal">min 3 chars, max 255</span></label>
            <input id="name"
                   type="text"
                   value=""
                   name="name"
                   placeholder="Jiri name"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        @php($now = now()->format('Y-m-d H:i'))
        <div class="flex flex-col gap-2">
            <label for="starting_at"
                   class="font-bold">Starting at<span class="block font-normal">formated like {{ $now }}</span></label>
            <input id="starting_at"
                   type="text"
                   value=""
                   name="starting_at"
                   placeholder="{{ $now }}"
                   autocapitalize="none"
                   autocorrect="off"
                   spellcheck="false"
                   class="border border-grey-700 focus:invalid:border-pink-500 invalid:text-pink-600 rounded-md p-2">
        </div>
        <x-form-sumission-button>Create this Jiri</x-form-sumission-button>
    </form>
</x-layouts.main>
