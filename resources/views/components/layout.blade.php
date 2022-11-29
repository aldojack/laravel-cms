<!doctype html>
<title>SpeakUp - @yield('title')</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js" defer></script>
<!-- @yield('styles') -->
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif" class="bg-blue-200">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/SpeakUp-logos_white.png" alt="Speakup Logo" width="165" height="16">
                </a>
            </div>

            <div class="bg-white flex items-baseline md:mt-0 mt-8 p-2 rounded-2xl self-start space-x-2 text-black">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase mr-2">{{auth()->user()->name}}</button>
                            <img src="https://i.pravatar.cc/40?u={{auth()->user()->id}}" alt="user avatar" width="40" height="40" class="rounded-full cursor-pointer">
                        </x-slot>
                        <x-dropdown-item href="/" :active="request()->is('/')">Home</x-dropdown-item>
                        @admin
                            <x-dropdown-item href="/admin/posts/" :active="request()->is('admin/posts/')">Dashboard</x-dropdown-item>
                            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>
                        @endadmin
                        @user
                            <x-dropdown-item href="/dashboard/posts/" :active="request()->is('dashboard/posts/')">Dashboard</x-dropdown-item>
                            <x-dropdown-item href="/dashboard/posts/create" :active="request()->is('dashboard/posts/create')">New Post</x-dropdown-item>
                        @enduser
                        <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Logout</x-dropdown-item>

                        <form method="post" action="/logout" class="hidden" id="logout-form">
                            @csrf
                            <button type="submit" class="text-sm font-semibold">Log Out</button>
                        </form>
                    </x-dropdown>

                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="text-xs font-bold uppercase">Login</a>
                @endauth

                        <a href="#newsletter" class="bg-blue-400 ml-3 rounded-full text-xs font-semibold text-black uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

    {{$slot}}


    </section>
    <footer id="newsletter"class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" type="text" required placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>
            </div>
        </footer>
    <x-flash/>
</body>
