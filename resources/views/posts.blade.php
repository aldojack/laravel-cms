<x-layout>
    @foreach($posts as $post)
        <article class="mb-4">
            <h1 class="font-bold text-lg">{{$post->title}}</h1>
            <p class="my-2">{{$post->excerpt}}</p>
            <a class= "bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5" href="/posts/{{$post->slug}}">Read More </a>
        </article>
    @endforeach
</x-layout>
