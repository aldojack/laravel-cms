<x-layout>
    @section('title', 'Login')
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <p class="text-center text-md">Sign in with</p>
                <div id="social-logins" class="flex justify-center py-4">
                    <a href="/login/github">
                        <button class="bg-white active:bg-slate-50 text-slate-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150" type="button"><img alt="..." class="w-5 mr-1" src="https://www.creative-tim.com/learning-lab/tailwind-starter-kit/img/github.svg">Github</button>
                    </a>
                    <a href="/login/google">
                        <button class="bg-white active:bg-slate-50 text-slate-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150" type="button"><img alt="..." class="w-5 mr-1" src="https://www.creative-tim.com/learning-lab/tailwind-starter-kit/img/google.svg">Google</button>
                    </a>
                </div>
                <hr/>
                <form method="post" action="/sessions" class="mt-4">
                    <p class="text-center text-md">Or sign in with credentials</p>
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

            </x-panel>
        </main>
    </section>
</x-layout>
