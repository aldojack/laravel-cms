@auth
    <x-panel>
        <form action="/posts/{{$post->slug}}/comments" method="POST">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-full">
                <h2 class="ml-4">Want to participate?</h2>
            </header>
            <div class="mt-6">
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring p-2" rows="5" placeholder="Quick, think of something to say" required></textarea>
                @error('body')
                    <span class="text-sm text-red-400">{{$message}}</span>
                @enderror
            </div>

            <div class="flex justify-start mt-6 pt-6 border-t border-gray-200 pt-6">
                <x-submit-button>
                    Post
                </x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a href="/login" class="font-bold text-blue-500 underline">Login</a> or <a href="/register" class="font-bold text-blue-500 underline">Register</a> to leave a comment.
    </p>
@endauth
