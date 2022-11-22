<x-layout>
    @section('title', 'Login')
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Login</h1>

                <form method="post" action="/sessions" class="mt-10">
                    @csrf
                    <x-form.input name="email" type="email" autocomplete="username"/>
                    <x-form.input name="password" type="password" autocomplete="new-password"/>
                    <x-form.button>
                        Login
                    </x-form.button>

                    <p class="mt-4"><a href="/register">Not registered? <span class="font-bold underline text-blue-500">Join today</span></a></p>
                @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-red-500 text-xs">{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                </form>
                <a href="/login/github" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 focus:bg-blue-600">Github</a>

            </x-panel>
        </main>
    </section>
</x-layout>
