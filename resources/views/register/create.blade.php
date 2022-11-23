<x-layout>
    @section('title', 'Register')
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
            <p class="text-center text-md">Sign up with</p>
                <div id="social-logins" class="flex justify-center py-4">
                    <a href="/login/github">
                        <button class="bg-white active:bg-slate-50 text-slate-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150" type="button"><img alt="..." class="w-5 mr-1" src="https://www.creative-tim.com/learning-lab/tailwind-starter-kit/img/github.svg">Github</button>
                    </a>
                    <a href="/login/google">
                        <button class="bg-white active:bg-slate-50 text-slate-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150" type="button"><img alt="..." class="w-5 mr-1" src="https://www.creative-tim.com/learning-lab/tailwind-starter-kit/img/google.svg">Google</button>
                    </a>
                </div>
                <hr/>
                <form method="POST" action="/register" class="mt-4">
                    @csrf
                    <p class="text-center text-md">Or sign in with credentials</p>
                    <x-form.input name="name" />
                    <x-form.input name="username" />
                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />
                    <x-form.button>Sign Up</x-form.button>
                    <p class="mt-4"><a href="/login">Already got an account? <span class="font-bold underline text-blue-500">Sign In</span></a></p>
                </form>
            </x-panel>
        </main>
    </section>

</x-layout>

